<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('admin.paymentsTable.index', compact('payments'));
    }

    public function create()
    {
        return view('admin.paymentsTable.create');
    }

    public function store(PaymentRequest $request)
    {
        Payment::create($request->validated());
        return redirect()->route('admin.payments.index')->with('success', 'Payment created successfully.');
    }

    public function show(Payment $payment)
    {
        return view('admin.paymentsTable.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        return view('admin.paymentsTable.update', compact('payment'));
    }

    public function update(PaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());
        return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('admin.payments.index')->with('success', 'Payment deleted successfully.');
    }
}
