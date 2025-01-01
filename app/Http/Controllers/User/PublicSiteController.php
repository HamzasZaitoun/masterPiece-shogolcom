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

class PublicSiteController extends Controller
{
    public function showLandingPage() {
        $categories = Category::all(); 
        
        //get recent jobs
        $recentJobs = Job::orderBy('created_at', 'desc')->limit(6)->get();
        
        // $existingApplication = Application::where('job_id', $job->job_id)
        // ->where('user_id', auth()->id())
        // ->first();
        // $hasApplied = $existingApplication ? true : false;
        
        //get urgent jobs
        $urgentJobs = Job::where('is_urgent', true)->limit(5)->get();

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
            $isCustomCategory = $request->input('job_category') === '2';
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



        public function showJobDetails($id)
        {
            //find the job 
            $job =Job::findOrFail($id);

            //get similer jobs
            $similerJobs = Job::where('job_category', $job->job_category)->where('user_id', '!=', auth()->id())->limit(3)->get();

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

            return view('user.jobs.jobDetails',compact('job','similerJobs',
            'hasApplied','jobApplications','isAccepted','workers','existingApplication'));
        }

        public function showJobs()
        {
            $jobs=Job::paginate(9);
            $categories=Category::all();
            $governorates=Governorate::all();
            // dd($governorates );
            return view('user.jobs.jobs',compact('jobs','categories','governorates'));
        }

    public function showFilterdJobs(Request $request)
{
    
    $jobTitle = $request->input('job_title');
   
    $governorate = $request->input('governorate');
    $paymentRange = $request->input('payment_range');
    $jobType = $request->input('job_type');
    $category = $request->input('category');

  
    $query = Job::query();


    if ($jobTitle) {
        $query->where('job_title', 'LIKE', '%' . $jobTitle . '%');
    }
    if ($governorate) {
        $query->where('job_governorate', $governorate);
    }
    if ($paymentRange) {
        // Modify this condition to match how payment is stored
        $query->whereBetween('payment_amount', $this->getPaymentRange($paymentRange));
    }
    if ($jobType) {
        $query->where('job_type', $jobType);
    }
    if ($category) {
        $query->where('job_category', $category);
    }
    //  dd($query->getQuery());
    
    $jobs = $query->paginate(9);
    $governorates=Governorate::all();
    $categories = Category::all();
    // dd($jobs);
    return view('user.jobs.jobs', compact('jobs','governorates','categories'));
}


private function getPaymentRange($range)
{
    switch ($range) {
        case '1':
            return [0, 20];
        case '2':
            return [21, 30];
        case '3':
            return [31, 40];
        case '4':
            return [41, PHP_INT_MAX]; 
        default:
            return [0, PHP_INT_MAX];
    }
}


public function applyToJob(Request $request, $job_id)
{
    $user_id = auth()->user()->id; 
    
    // Check if user has already applied to this job
    
   
    // Insert the application
    Application::insert([
        'job_id' => $job_id,
        'user_id' => $user_id,
        'application_status' => 'pending', // Default status
        'applied_at' => now(),
    ]);

   return redirect()->route('JobDetails',$job_id)->with('success','appplied succefully');
}

public function deleteApplication($job_id)
{
    $user_id = auth()->user()->id;

    // Check if the application exists
    $existingApplication = Application::where('job_id', $job_id)
        ->where('user_id', $user_id)
        ->first();

    if ($existingApplication) {
        // Delete the application
        Application::where('job_id', $job_id)
            ->where('user_id', $user_id)
            ->delete();

        return redirect()->route('JobDetails', $job_id)->with('success', 'Your application has been deleted.');
    }

    return redirect()->route('JobDetails', $job_id)->with('error', 'You have not applied for this job.');
}


////////////////////


    
    }
