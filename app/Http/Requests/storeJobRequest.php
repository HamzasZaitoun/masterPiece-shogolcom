<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeJobRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'governate' => 'required|string',
            'city' => 'required|string',
            'payment' => 'required|numeric|min:1',
            'duration' => 'required|numeric|min:1', // Duration in days or hours
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image
        ];
    }
}
