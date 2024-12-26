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
}
