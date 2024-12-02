<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeJobRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Job;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs=Job::all();
        return view('admin.JobsTable.index',compact('jobs')); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jobsTable.create'); 

    }
    public function getCitiesByGovernate($governate)
    {
        // Load the JSON file containing cities
        $json = File::get(resource_path('data/governates.json'));
        $cities = json_decode($json, true);
    
        // Filter cities based on the selected governate
        if (isset($cities[$governate])) {
            $filteredCities = $cities[$governate];
        } else {
            $filteredCities = [];
        }
    
        // Return the filtered cities as a JSON response
        return response()->json($filteredCities);
    }
    
    /**
     * Store a newly created resource in storage.
     */
  
     public function store(Request $request)
     {
         // Validate the incoming request data
         $validated = $request->validate([
             'user_id' => 'required|exists:users,id',
             'job_title' => 'required|string|max:255',
             'job_description' => 'required|string',
             'job_governate' => 'required|string|max:255',
             'job_city' => 'required|string|max:255',
             'job_detailed_location' => 'nullable|string|max:255',
             'job_type' => 'required|in:day,month,project',
             'payment_amount' => 'required|numeric|min:0',
             'job_duration' => 'nullable|integer|min:1',
             'is_urgent' => 'required|boolean',
             'post_deadline' => 'required|date',
             'start_date' => 'required|date',
             'job_category' => 'required|exists:categories,category_id',
             'job_status' => 'required|in:open,closed,completed,cancelled',
             'payment_status' => 'required|in:pending,paid',
             'job_visibility' => 'required|in:public,private',
             'priority_level' => 'nullable|integer|min:0',
             'is_custom_category' => 'required|boolean',
             'custom_category' => 'nullable|string|max:255',
             'number_of_workers' => 'required|integer|min:1',
             'max_applicants' => 'required|integer|min:1',
             'job_media' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
         ]);
     
         // Create a new Job instance using the validated data
         $job = new Job($validated);
     
         // Check if a job media file is uploaded
         if ($request->hasFile('job_media')) {
             // Save the uploaded file in the 'jobs' folder under the 'public' disk
             $fileName = time() . '.' . $request->job_media->extension();
             $request->job_media->move(public_path('uploads/jobs'), $fileName);
             $job->job_media = $fileName;
         }
     
         // Save the Job to the database
         $job->save();
     
         // Redirect to the jobs index page with a success message
         return redirect()->route('admin.jobs.index')->with('success', 'Job posted successfully!');
     }
     
     


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::with('category')->find($id);
        return view('admin.jobsTable.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
