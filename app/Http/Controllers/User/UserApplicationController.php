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
}
