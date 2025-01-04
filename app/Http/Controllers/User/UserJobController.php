<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\User\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Application;
use App\Models\Category;
use App\Models\Governorate;
use App\Models\UserToUserReview;

class UserJobController extends Controller
{
    public function archiveJob($id)
    {
        $job = Job::findOrFail($id);

        if($job)
        {
            $job->job_visibility="private";
            $job->save();

            return redirect()->route('profile')->with('success','job archived succefully');
        }
        else
        {
            return redirect()->back()->with('error','job not found');
        }

    }
    public function unArchiveJob($id)
    {
        $job = Job::findOrFail($id);

        if($job)
        {
            $job->job_visibility="public";
            $job->save();

            return redirect()->route('profile')->with('success','job unarchived succefully');
        }
        else
        {
            return redirect()->back()->with('error','job not found');
        }

    }
    public function cancelJob(Request $request, $job_id)
{
    $validated = $request->validate([
        'cancellation_reason' => 'required|string|max:255',
        'other_reason' => 'nullable|string|max:255',
    ]);

    // Check if the reason is "Other" and use the specified other reason if provided
    $reason = $validated['cancellation_reason'] === 'Other' ? $validated['other_reason'] : $validated['cancellation_reason'];

    // Find the job by its ID
    $job = Job::findOrFail($job_id);

    // Update the job status to 'cancelled' and store the cancellation reason
    $job->job_status = 'cancelled';
    $job->cancellation_reason = $reason;
    $job->delete();
    $job->save();

    // Optionally, add a success message or redirection
    return redirect()->route('profile')->with('success', 'Job cancelled successfully with reason: ' . $reason);
}
 
public function completeJob(Request $request, $job_id)
{
    // dd($request->ratings);
    // Find the job using the ID
    $job = Job::findOrFail($job_id);

    // Validate the form input for each worker
    $request->validate([
        'ratings' => 'required|array',
        'ratings.*.question1' => 'required|integer|min:1|max:5',
        'ratings.*.question2' => 'required|integer|min:1|max:5',
        'ratings.*.question3' => 'required|integer|min:1|max:5',
        'ratings.*.review_text' => 'nullable|string|max:1000',
    ]);

    // Loop through each worker's ratings and create reviews
    foreach ($request->ratings as $workerId => $ratingData) {
        // Retrieve the worker's application using the application_id
        $application = Application::where('application_id', $ratingData['application_id'])->first();
        
        // Create or update a review for the worker
        $review = new UserToUserReview();
        $review->reviewer_id = auth()->user()->id;  // The employer is the reviewer
        $review->reviewed_id = $workerId;           // The worker being reviewed
        $review->reviewer_role = 'employer';        // The role of the reviewer
        $review->job_id = $job->job_id;            
        $review->application_id = $ratingData['application_id']; 
        $review->rating = floor(($ratingData['question1'] + $ratingData['question2'] + $ratingData['question3']) / 3); 
        $review->review_text = $ratingData['review_text'] ?? '';  
        $review->save(); 

        // Optionally, update the worker's rating and rating count here
        $worker = User::findOrFail($workerId);
        $newRating = (($worker->rating * $worker->rating_count) + $review->rating) / ($worker->rating_count + 1);
        $worker->rating = $newRating;
        $worker->rating_count += 1;
        $worker->save();
    }

    // Mark the job as completed (assuming a `completed_at` field)
    $job->job_status = 'completed';
    $job->payment_status = 'paid';

    $job->save();

    // Redirect with success message
    return redirect()->route('profile')->with('success', 'Job marked as completed and reviews submitted successfully');
}

public function showEditJob($id)
{
    $job =Job::FindOrFail($id);
    $categories=Category::all();
    $governorates=Governorate::all();
    return view('user.jobs.edit', compact('job','categories','governorates'));
}

public function editJob(Request $request, $id)
{
    // Find the job by its ID
    $job = Job::findOrFail($id);

    // Validate the request data
    $validatedData = $request->validate([
        'job_title' => 'required|string|max:255',
        'job_category' => 'required|integer',
        'custom_category' => 'nullable|string|max:255',
        'job_type' => 'required|string|in:day,month,project',
        'job_description' => 'required|string|max:255',
        'job_governorate' => 'required|string',
        'job_city' => 'required|string',
        'job_detailed_location' => 'nullable|string|max:255',
        'payment_amount' => 'required|numeric|min:0',
        'number_of_workers' => 'nullable|integer|min:1',
        'start_date' => 'required|date',
        'job_duration' => 'nullable|integer|min:1',
        'is_urgent' => 'nullable|boolean',
        'job_media' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'  // 2MB max size
    ]);

    // Update job fields
    $job->job_title = $validatedData['job_title'];
    $job->job_category = $validatedData['job_category'];
    $job->custom_category = $validatedData['custom_category'] ?? null;
    $job->job_type = $validatedData['job_type'];
    $job->job_description = $validatedData['job_description'];
    $job->job_governorate = $validatedData['job_governorate'];
    $job->job_city = $validatedData['job_city'];
    $job->job_detailed_location = $validatedData['job_detailed_location'] ?? null;
    $job->payment_amount = $validatedData['payment_amount'];
    $job->number_of_workers = $validatedData['number_of_workers'] ?? null;
    $job->start_date = $validatedData['start_date'];
    $job->job_duration = $validatedData['job_duration'] ?? null;
    $job->is_urgent = $request->has('is_urgent') ? 1 : 0;

    // Handle job media upload
    if ($request->hasFile('job_media')) {

            $fileName = time() . '.' . $request->job_media->extension();
            $request->job_media->move(public_path('uploads/jobs'), $fileName);
            $job->job_media = $fileName;
        
    }

    // Save the job
    $job->save();

    // Redirect to a success page or back to the job edit form
    return redirect()->route('JobDetails', $job->job_id)->with('success', 'Job updated successfully.');
}

}
