<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $primaryKey = 'job_id';
    protected $fillable = [
        'user_id', 'job_title', 'job_description', 'job_governate',
        'job_city', 'job_detailed_location', 'job_type', 'payment_amount',
        'job_duration', 'is_urgent', 'post_deadline', 'max_applicants', 'start_date',
        'job_media', 'job_category', 'job_status', 'payment_status', 'job_visibility',
        'priority_level', 'is_custom_category', 'custom_category', 'number_of_workers',
        'cancellation_reason','max_applicants',
    ];
    public function category()
{
    return $this->belongsTo(Category::class, 'job_category');
}
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
