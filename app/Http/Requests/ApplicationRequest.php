<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'job_id' => 'required|exists:jobs,job_id',
            'application_status' => 'required|in:pending,accepted,rejected',
            'applied_at' => 'nullable|date',
            'accepted_at' => 'nullable|date',
            'completed_at' => 'nullable|date',
        ];
    }
}
