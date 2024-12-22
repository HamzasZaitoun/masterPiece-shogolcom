<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'birth_date',
        'mobile_number',
        'profile_picture',
        'balance',
        'bio',
        'role',
        'account_status',
        'password',
        'user_governorate',   // New field
        'user_city',         // New field
        'user_detailed_location', // New field
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function apllication()
    {
        return $this->hasMany(Application::class, 'application_id');
    }
}
