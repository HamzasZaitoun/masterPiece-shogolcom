<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserToUserReview extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_to_user_reviews';
    protected $primaryKey = 'review_id';

    protected $fillable = [
        'application_id',
        'rating',
        'review_text',
    ];

    // Relationship with Application
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
