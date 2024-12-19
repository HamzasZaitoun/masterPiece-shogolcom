<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Governate;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('admin.jobsTable.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jobsTable.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return response()->json($filteredCities);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'job_governate' => 'required|string|max:255',
            'job_city' => 'required|string|max:255',
            'job_type' => 'required|in:day,month,project',
            'payment_amount' => 'required|numeric|min:0',
            'job_duration' => 'nullable|integer|min:1',
            'is_urgent' => 'required|boolean',
            'post_deadline' => 'required|date',
            'start_date' => 'required|date',
            'job_status' => 'required|in:open,closed,completed,cancelled',
            'payment_status' => 'required|in:pending,paid',
            'job_visibility' => 'required|in:public,private',
            'number_of_workers' => 'required|integer|min:1',
            'job_media' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $job = new Job($validated);

        if ($request->hasFile('job_media')) {
            $fileName = time() . '.' . $request->job_media->extension();
            $request->job_media->move(public_path('uploads/jobs'), $fileName);
            $job->job_media = $fileName;
        }

        $job->save();

        return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::with('category')->findOrFail($id);
        return view('admin.jobsTable.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobsTable.update', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'job_governate' => 'required|string|max:255',
            'job_city' => 'required|string|max:255',
            'job_type' => 'required|in:day,month,project',
            'payment_amount' => 'required|numeric|min:0',
            'is_urgent' => 'required|boolean',
            'post_deadline' => 'required|date',
            'start_date' => 'required|date',
            'job_status' => 'required|in:open,closed,completed,cancelled',
        ]);

        $job = Job::findOrFail($id);

        if ($request->hasFile('job_media')) {
            // Delete the old file if it exists
            if ($job->job_media && File::exists(public_path('uploads/jobs/' . $job->job_media))) {
                File::delete(public_path('uploads/jobs/' . $job->job_media));
            }

            // Store the new file
            $fileName = time() . '.' . $request->job_media->extension();
            $request->job_media->move(public_path('uploads/jobs'), $fileName);
            $validated['job_media'] = $fileName;
        }

        $job->update($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $job = Job::where('job_id', $id)->first();
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully!');
    }
}
