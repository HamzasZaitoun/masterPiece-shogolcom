@extends('admin.source.template')

@section('content')
    <h1 class="heading-primary">Payment Details</h1>
    {{-- <div class="payment-details">
        <p><strong>ID:</strong> {{ $payment->id }}</p>
        <p><strong>User ID:</strong> {{ $payment->user->name . ' ' . $payment->user->last_name }}</p>
        <p><strong>Job ID:</strong> {{ $payment->job->job_title }}</p>
        <p><strong>Amount:</strong> ${{ number_format($payment->payment_amount, 2) }}</p>
        <p><strong>Platform Fee:</strong> ${{ number_format($payment->platform_commission, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($payment->payment_status) }}</p>
        <p><strong>Method:</strong> {{ ucfirst($payment->payment_method) }}</p>
        <p><strong>Transaction ID:</strong> {{ $payment->transaction_id }}</p>
        <p><strong>Created At:</strong> {{ $payment->created_at }}</p>
        <p><strong>Updated At:</strong> {{ $payment->updated_at }}</p>
    </div> --}}
    {{-- <a href="{{ route('admin.payments.index') }}" class="button-back">Back to List</a> --}}
    <div class="centered-container">
        <div class="outer-wrapper">
            <div class="inner-wrapper">
                <div class="payment-card">
                    <div class="card-content">
                        <h2 class="card-title">
                            Hello {{ $payment->user->name . ' ' . $payment->user->last_name }},
                        </h2>
                        <p class="payment-text">
                            This is the payment of
                            <strong>${{ number_format($payment->payment_amount, 2) }}</strong> (USD)
                            for the job.
                        </p>

                        <div class="summary-section">
                            <div class="summary-row">
                                <div class="summary-column">
                                    <div class="label">Payment No.</div>
                                    <strong>#{{ $payment->id }}</strong>
                                </div>
                                <div class="summary-column text-right">
                                    <div class="label">Payment Date</div>
                                    <strong>{{ $payment->created_at }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="details-section">
                            <div class="details-row">
                                <div class="details-column">
                                    <div class="label">Client</div>
                                    <strong>{{ $payment->user->name . ' ' . $payment->user->last_name }}</strong>
                                    <p class="contact-info">
                                        {{ $payment->user->email }}
                                        <br>
                                        <a href="#" class="email-link">{{ $payment->user->mobile_number }}</a>
                                    </p>
                                </div>
                                <div class="details-column text-right">
                                    <div class="label">Payment To</div>
                                    <strong>{{ $payment->job->job_title }}</strong>
                                    <p class="contact-info">
                                        {{ ucfirst($payment->payment_status) }}
                                        <br>
                                        <a href="#" class="email-link">{{ ucfirst($payment->payment_method) }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-container">
                        <button onclick="location.href='{{ route('admin.payments.edit', $payment->id) }}'"
                            class="edit-btn btn btn-primary btn-lg shadow-sm rounded-pill px-4 py-2 my-3">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
