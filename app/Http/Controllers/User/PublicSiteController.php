<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Governorate;
use App\Models\Job;

class PublicSiteController extends Controller
{
    public function showLandingPage() {
        $categories = Category::all(); 
        
        
        $recentJobs = Job::orderBy('created_at', 'desc')->limit(6)->get();
    
        
        $urgentJobs = Job::where('is_urgent', true)->limit(5)->get();
        // dd($categories);
        return view('user.homePage.index', [
            'categories' => $categories,
            'recentJobs' => $recentJobs,
            'urgentJobs' => $urgentJobs
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
            $job =Job::findOrFail($id);
            $similerJobs = Job::where('job_category', $job->job_category)->where('user_id', '!=', auth()->id())->limit(3)->get();

            return view('user.jobs.jobDetails',compact('job','similerJobs'));
        }

        public function showJobs()
        {
            $jobs=Job::paginate(9);
            return view('user.jobs.jobs',compact('jobs'));
        }

    
    }
