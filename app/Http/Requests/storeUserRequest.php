<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:20'],
            'last_name' => ['required', 'string', 'min:3', 'max:20'],
            'gender' => ['required'],
            'mobile_number' => ['required', 'integer'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'profilePicture' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'balance' => ['nullable'],
            'bio' => ['nullable'],
            'role' => ['required'],
            'accountStatus' => ['required'],
            'user_governate' => ['required', 'string', 'max:255'],  // New field validation
            'user_city' => ['required', 'string', 'max:255'],        // New field validation
            'user_detailed_location' => ['required', 'string', 'max:255'],  // New field validation
        ];
    }
}
