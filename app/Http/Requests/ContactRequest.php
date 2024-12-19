<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set to true or implement custom authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'nullable|integer|exists:users,id',
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'category' => 'required|in:Technical Issue,Feedback,General Inquiry,Other',
            'message' => 'required|string',
            'status' => 'nullable|in:pending,reviewed,resolved,closed',
            'response' => 'nullable|string',
        ];
    }
}
