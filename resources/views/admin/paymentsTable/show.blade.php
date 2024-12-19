@extends('admin.source.template')

@section('content')
    <h1>Payment Details</h1>
    <div class="details">
        <p><strong>ID:</strong> {{ $payment->id }}</p>
        <p><strong>User ID:</strong> {{ $payment->user->name . ' ' . $payment->user->last_name }}</p>
        <p><strong>Job ID:</strong> {{ $payment->job->job_title }}</p>
        <p><strong>Amount:</strong> ${{ number_format($payment->payment_amount, 2) }}</p>
        <p><strong>Platform Commission:</strong> ${{ number_format($payment->platform_commission, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($payment->payment_status) }}</p>
        <p><strong>Method:</strong> {{ ucfirst($payment->payment_method) }}</p>
        <p><strong>Transaction ID:</strong> {{ $payment->transaction_id }}</p>
        <p><strong>Created At:</strong> {{ $payment->created_at }}</p>
        <p><strong>Updated At:</strong> {{ $payment->updated_at }}</p>
    </div>
    <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
