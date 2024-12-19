<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'job_id',
        'user_id',
        'payment_amount',
        'platform_commission',
        'payment_status',
        'net_payment',
        'payment_method',
        'transaction_id',
    ];
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id'); 
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

