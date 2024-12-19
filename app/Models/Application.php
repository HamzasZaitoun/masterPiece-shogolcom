<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    protected $primaryKey = 'application_id'; // Set the custom primary key
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'job_id',
        'application_status',
        'applied_at',
        'accepted_at',
        'completed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }
}
