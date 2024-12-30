<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

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
    $job->deleted_at =now();
    $job->save();

    // Optionally, add a success message or redirection
    return redirect()->route('profile')->with('success', 'Job cancelled successfully with reason: ' . $reason);
}

}
