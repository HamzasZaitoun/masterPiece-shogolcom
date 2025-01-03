<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'category_id';

    protected $fillable=['category_name','category_description','category_picture'];

    public function jobs()
{
    return $this->hasMany(Job::class, 'job_category'); 
}
}
