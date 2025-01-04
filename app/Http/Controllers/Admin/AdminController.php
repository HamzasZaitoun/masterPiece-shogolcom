<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function dashboard()
{
    // Assuming you have the models Job and Category, adjust as necessary.
    $totalJobs = Job::count();
    $completedJobs = Job::where('job_status', 'completed')->count();
    $pendingJobs = Job::where('job_status', 'open')->count();
    $cancelledJobs = Job::where('job_status', 'cancelled')->count();

    $dailyUsers = User::whereDate('updated_at', Carbon::today())->count();
    $customCategories = Job::whereNotNull('custom_category')->count();


    $latestUsers = User::orderBy('created_at', 'desc')->take(4)->get();
    // Calculate Percentages

    $completedJobsPercentage = $this->calculatePercentage($completedJobs, $totalJobs);
    $pendingJobsPercentage = $this->calculatePercentage($pendingJobs, $totalJobs);
    $cancelledJobsPercentage = $this->calculatePercentage($cancelledJobs, $totalJobs);
    $dailyUsersPercentage =  ($dailyUsers/User::all()->count())*100; 
    $customCategoriesPercentage =$this->calculatePercentage($customCategories,$pendingJobs);

    return view('admin.dashboard', compact(
        'totalJobs', 'completedJobs', 'pendingJobs', 'cancelledJobs', 
        'dailyUsers', 'customCategories',  'completedJobsPercentage', 
        'pendingJobsPercentage', 'cancelledJobsPercentage', 'dailyUsersPercentage', 
        'customCategoriesPercentage',
        'latestUsers'
    ));
}

// Helper function to calculate percentage
private function calculatePercentage($current, $total)
{
    return $total > 0 ? round(($current / $total) * 100, 2) : 0;
}

}
