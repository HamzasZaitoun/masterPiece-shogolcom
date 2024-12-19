<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserToUserReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Modify based on your authorization logic
    }

    public function rules()
    {
        return [
            'application_id' => 'required|exists:applications,application_id', // Validate application_id exists in the applications table
            'rating' => 'required|numeric|min:1|max:5', // Rating should be between 1 and 5
            'review_text' => 'nullable|string|max:500', // Review text (optional but should be a string)
        ];
    }
}
