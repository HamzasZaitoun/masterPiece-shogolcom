<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\UserToUserReview;
class UserApplicationController extends Controller
{
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

    // reject application function
    public function regectApplication($id)
    {
        $application=Application::findOrFail($id);

        if($application)
        {
            $application->application_status='rejected';
            $application->save();

            return redirect()->back()->with('success','rejected');
        }

    }
    public function acceptApplication($id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);
    
        if ($application) {
            // Get the related job
            $job = $application->job; // Assuming you have a relationship between Application and Job
    
            // Check how many workers have already been accepted for this job
            $acceptedWorkersCount = Application::where('job_id', $job->job_id)
                ->where('application_status', 'accepted')
                ->count();
    
            // If the job is already closed or the number of accepted workers has reached the limit, don't allow more acceptance
            if ($job->job_status === 'closed' || $acceptedWorkersCount >= $job->number_of_workers) {
                return redirect()->back()->with('error', 'This job is already closed or fully staffed.');
            }
    
            // Accept the application
            $application->application_status = 'accepted';
            $application-> accepted_at = now();
            $application->save();
    
            // Check if the accepted workers count now meets or exceeds the required number of workers
            if ($acceptedWorkersCount + 1 >= $job->number_of_workers) {
                // Close the job
                $job->job_status = 'closed';
                $job->save();
    
                // Redirect the user to their profile with the success message to start the job process
                return redirect()->route('profile')->with('success', 'All workers accepted. Start your job process here, under your current jobs tab');
            }
    
            // Otherwise, return to the previous page with a success message for the accepted application
            return redirect()->back()->with('success', 'Application accepted successfully');
        }
    }
    
    public function completeJobByApplication(Request $request, $id)
    {
        // Find the application using the ID
        $application = Application::findOrFail($id);
    
        // Validate the form input
        $request->validate([
            'question1' => 'required|integer|min:1|max:5',
            'question2' => 'required|integer|min:1|max:5',
            'question3' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string|max:1000',
        ]);
    
        $review = new UserToUserReview();
        $review->reviewer_id = $application->user_id; // Worker
        $review->reviewed_id = $application->job->user_id; // Employer
        $review->reviewer_role = 'worker';
        $review->job_id = $application->job_id;
        $review->application_id = $application->application_id;
        $review->rating = floor(($request->question1 + $request->question2 + $request->question3) / 3);
        $review->review_text = $request->review_text;
        $created_at = now();
        
        // Debugging the review before saving
        // dd($review);
        
        // Save the review to the database
        $review->save();
        
        // Update the application completion timestamp
        $application->completed_at = now();
        $application->save();
        
        // Now, update the employer's rating and rating count
        $reviewed = User::findOrFail($review->reviewed_id);
        
        // Calculate new average rating for the reviewed
        $newRating = (($reviewed->rating * $reviewed->rating_count) + $review->rating) / ($reviewed->rating_count + 1);
        
        // Update the reviewed's rating and increment the rating count
        $reviewed->rating = $newRating;  // New average rating
        $reviewed->rating_count += 1;  // Increment the rating count
        $reviewed->save();
        
    
        
        return redirect()->route('profile')->with('success', 'Job marked as completed and review submitted succefully');
    }
    

}
