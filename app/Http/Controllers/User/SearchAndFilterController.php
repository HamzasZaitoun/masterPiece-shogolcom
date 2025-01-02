<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Governorate;
use App\Models\Job;

class SearchAndFilterController extends Controller
{
    public function showFilterdJobs(Request $request)
    {
        
        $jobTitle = $request->input('job_title');
       
        $governorate = $request->input('governorate');
        $paymentRange = $request->input('payment_range');
        $jobType = $request->input('job_type');
        $category = $request->input('category');
    
      
        $query = Job::query();
    
    
        if ($jobTitle) {
            $query->where('job_title', 'LIKE', '%' . $jobTitle . '%');
        }
        if ($governorate) {
            $query->where('job_governorate', $governorate);
        }
        if ($paymentRange) {
            // Modify this condition to match how payment is stored
            $query->whereBetween('payment_amount', $this->getPaymentRange($paymentRange));
        }
        if ($jobType) {
            $query->where('job_type', $jobType);
        }
        if ($category) {
            $query->where('job_category', $category);
        }
        //  dd($query->getQuery());
        
        $jobs = $query->where('job_status','open')->paginate(9);
        $governorates=Governorate::all();
        $categories = Category::all();
        // dd($jobs);
        return view('user.jobs.jobs', compact('jobs','governorates','categories'));
    }
    private function getPaymentRange($range)
{
    switch ($range) {
        case '1':
            return [0, 20];
        case '2':
            return [21, 30];
        case '3':
            return [31, 40];
        case '4':
            return [41, PHP_INT_MAX]; 
        default:
            return [0, PHP_INT_MAX];
    }
}
}
