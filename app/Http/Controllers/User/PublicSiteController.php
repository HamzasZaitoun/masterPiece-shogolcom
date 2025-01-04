<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebsiteReviewController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Governorate;
use App\Models\Job;
use App\Models\Review;
use App\Models\Application;
use App\Models\User;

class PublicSiteController extends Controller
{
    public function showLandingPage() {
        $categories = Category::withCount(['jobs' => function ($query) {
            $query->where('job_visibility', 'public')->where('job_status', 'open');
        }])->get();
        
        //get recent jobs
        $recentJobs = Job::where('job_visibility','public')->where('job_status','open')->orderBy('created_at', 'desc')->limit(6)->get();
        
        // $existingApplication = Application::where('job_id', $job->job_id)
        // ->where('user_id', auth()->id())
        // ->first();
        // $hasApplied = $existingApplication ? true : false;
        
        //get urgent jobs
        $urgentJobs = Job::where('is_urgent', true)->where('job_visibility','public')->where('job_status','open')->limit(5)->get();

        //get testimonials
        $testimonials=Review::where('is_approved',1)->get();
        // dd($testimonials);

        // dd($categories);
        return view('user.homePage.index', [
            'categories' => $categories,
            'recentJobs' => $recentJobs,
            'urgentJobs' => $urgentJobs,
            'testimonials'=>$testimonials,
            // 'hasApplied'=>$hasApplied
        ]);
    }

    public function showJobs(Request $request)
{
    // Get the sorting option from the request, default to 'newest'
    $sortOption = $request->input('sort', 'newest');

    // Query to get jobs with sorting
    $jobsQuery = Job::where('job_visibility', 'public')
        ->where('job_status', 'open');

    // Apply sorting logic based on the sort option
    if ($sortOption == 'highest_salary') {
        $jobsQuery->orderBy('payment_amount', 'desc'); // Sort by highest salary
    } else {
        // Default to sorting by newest jobs
        $jobsQuery->orderBy('created_at', 'desc');
    }

    // Fetch the jobs with pagination
    $jobs = $jobsQuery->paginate(9);

    // Get other data like categories and governorates
    $categories = Category::all();
    $governorates = Governorate::all();

    // Return view with the jobs and sortOption
    return view('user.jobs.jobs', compact('jobs', 'categories', 'governorates', 'sortOption'));
}

    

    public function showPostJobPage()
     {
        
        $categories = Category::all();
        $governorates=Governorate::all();
    
        return view('user.jobs.postJob', ['categories' => $categories,'governorates'=>$governorates]);
    }


    public function createJobPost(Request $request)


        {
            // Validation for job posting
            $validated = $request->validate([
                'job_title' => 'required|string|max:255',
                'job_description' => 'required|string',
                'job_category' => 'required|string',
                'job_governorate' => 'required|string|max:255',
                'job_city' => 'required|string|max:255',
                'job_detailed_location' => 'nullable|string|max:255',
                'job_type' => 'required|in:day,month,project',
                'payment_amount' => 'required|numeric|min:0',
                'job_duration' => 'nullable|integer|min:1',
                'is_urgent' => 'nullable|boolean',
                'start_date' => 'required|date',
                'number_of_workers' => 'required|integer|min:1',
                'job_media' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'custom_category' => 'nullable|string|max:255',
            ]);
            $isCustomCategory = $request->input('job_category') === '6';
            $customCategory = $isCustomCategory ? $request->input('custom_category') : null;
            // Create the job post
            $job = new Job(array_merge(
                $validated,
                ['user_id' => auth()->id(),
                'is_custom_category'=>$isCustomCategory, 
                'custom_category' => $customCategory,
            
                 ]));
            

            // Handle file upload if there is a job media file
            if ($request->hasFile('job_media')) {
                $fileName = time() . '.' . $request->job_media->extension();
                $request->job_media->move(public_path('uploads/jobs'), $fileName);
                $job->job_media = $fileName;
            }

            // Save the job to the database
            $job->save();

            return redirect()->route('home')->with('success', 'Job posted successfully!');
        }



   



     

  








////////////////////

    
public function showJobDetails($id)
{
    //find the job 
    $job =Job::findOrFail($id);

    //get similer jobs
    $similerJobs = Job::where('job_category', $job->job_category)->where('user_id', '!=', auth()->id())->where('job_id','!=',$id)->limit(3)->get();

    //check if the user applied for the job
    $existingApplication = Application::where('job_id', $job->job_id)
    ->where('user_id', auth()->id())
    ->first();

    //store the check result
    $hasApplied = $existingApplication ? true : false;

    //check if the user accepted in the job
    $isAccepted=$existingApplication?($existingApplication->application_status === 'accepted'):false;

    //get all job applications
    $jobApplications=Application::where('job_id',$job->job_id)->where('application_status','pending')->paginate(3);

    //get all the accepted workers in the job
    $workers=Application::where('job_id',$job->job_id)->where('application_status', 'accepted')->paginate(3);
    
    //check if the job is completed by the worker (logged in user)
    $isCompleted = $existingApplication && $existingApplication->completed_at != null;



    //check if the job is completed by the job workers
    $isCompletedByWorkers =$this->canMarkJobAsCompleted($job->job_id);


    // dd($isCompleted);
    return view('user.jobs.jobDetails',compact('job','similerJobs',
    'hasApplied','jobApplications','isAccepted','workers','existingApplication','isCompletedByWorkers','isCompleted'));
}

public function canMarkJobAsCompleted($job_id) {
    $completedWorkers = Application::where('job_id', $job_id)
        ->whereNotNull('completed_at')
        ->count();
    // dd($completedWorkers);
    // Compare the number of completed workers with the total number of workers for the job
    $totalWorkers = Application::where('job_id', $job_id)->where('application_status','accepted')->count();
    // dd($totalWorkers);
    // If the count of completed workers matches the total number of workers, all have completed
    return $completedWorkers === $totalWorkers;
}


public function showJobsByCategory($id)
    {
        $jobs=Job::where('job_category',$id)->where('job_status','open')->paginate(9);
        $category=Category::findOrFail($id);
      
        return view('user.categories.category',compact('jobs','category'));
    }


}
