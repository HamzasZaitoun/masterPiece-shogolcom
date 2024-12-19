<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'job_id' => 'required|exists:jobs,job_id',
            'user_id' => 'required|exists:users,id',
            'payment_amount' => 'required|numeric|min:0',
            'platform_commission' => 'required|numeric|min:0',
            'payment_status' => 'required|in:pending,escrow,completed,refunded',
            'net_payment' => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,wallet,bank_transfer,visa',
            'transaction_id' => 'nullable|string|max:255',
        ];
    }
}
