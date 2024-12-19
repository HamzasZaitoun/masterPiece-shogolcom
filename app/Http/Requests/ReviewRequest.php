<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|numeric|min:0|max:5',
            'review_text' => 'nullable|string',
            'is_approved' => 'required|boolean',
            'reply_text' => 'nullable|string',
        ];
    }
}
