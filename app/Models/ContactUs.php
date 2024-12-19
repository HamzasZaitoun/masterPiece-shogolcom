<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ContactUs extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'contact_us';
    protected $primaryKey = 'contact_id';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'category',
        'message',
        'status',
        'response',
        'responded_at',
    ];
}
