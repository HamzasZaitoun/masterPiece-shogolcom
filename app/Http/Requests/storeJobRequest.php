<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeJobRequest extends FormRequest
{
 
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'job_governorate' => 'required|string',
            'job_city' => 'required|string',
            'payment_status' => 'required|numeric|min:1',
            'duration' => 'required|numeric|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}