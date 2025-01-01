<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
class UserApplicationController extends Controller
{
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
    
    public function completeJob($id)
    {
        $application=Application::findOrFail($id);
        if($application && $application->application_status==='accepted')
        {
            $application->completed_at = now();
            $application->save();

            return redirect()->route('profile')->with('success','job completed succefully');
        }
        return redirect()->back()->with('error','something went wrong!');
    }

}
