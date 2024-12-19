@extends('admin.source.template')

@section('content')
    <h1>Edit Payment</h1>
    @if ($errors->all())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form" action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            {{-- <label for="user_id">User ID</label> --}}
            <input class="input" placeholder=""type="number" name="user_id" id="user_id" class="form-control"
                value="{{ $payment->user_id }}" required>
        </div>
        <div class="form-group">
            {{-- <label for="job_id">Job ID</label> --}}
            <input class="input" placeholder=""type="number" name="job_id" id="job_id" class="form-control"
                value="{{ $payment->job_id }}" required>
        </div>
        <div class="form-group">
            {{-- <label for="payment_amount">Payment Amount</label> --}}
            <input class="input" placeholder=""type="text" name="payment_amount" id="payment_amount" class="form-control"
                value="{{ $payment->payment_amount }}" required>
        </div>
        <div class="form-group">
            {{-- <label for="net_payment">Net payment</label> --}}
            <input class="input" placeholder=""type="text" name="net_payment" id="net_payment" class="form-control"
                required>
        </div>
        <div class="form-group">
            {{-- <label for="platform_commission">Platform Commission</label> --}}
            <input class="input" placeholder=""type="text" name="platform_commission" id="platform_commission"
                class="form-control" value="{{ $payment->platform_commission }}" required>
        </div>
        <div class="select-container">
            {{-- <label for="payment_status">Payment Status</label> --}}
            <select class="select" name="payment_status" id="payment_status" class="form-control" required>
                <option value="pending" {{ $payment->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="escrow" {{ $payment->payment_status == 'escrow' ? 'selected' : '' }}>Escrow</option>
                <option value="completed" {{ $payment->payment_status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="refunded" {{ $payment->payment_status == 'refunded' ? 'selected' : '' }}>Refunded</option>
            </select>
        </div>
        <div class="select-container">
            {{-- <label for="payment_method">Payment Method</label> --}}
            <select class="select" name="payment_method" id="payment_method" class="form-control" required>
                <option value="cash" {{ $payment->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="wallet" {{ $payment->payment_method == 'wallet' ? 'selected' : '' }}>Wallet</option>
                <option value="bank_transfer" {{ $payment->payment_method == 'bank_transfer' ? 'selected' : '' }}>Bank
                    Transfer</option>
                <option value="visa" {{ $payment->payment_method == 'visa' ? 'selected' : '' }}>Visa</option>
            </select>
        </div>
        <div class="form-group">
            {{-- <label for="transaction_id">Transaction ID</label> --}}
            <input class="input" placeholder=""type="text" name="transaction_id" id="transaction_id" class="form-control"
                value="{{ $payment->transaction_id }}">
        </div>
        <div></div>
        <div></div>

        <button type="submit" class="edit-save-btn">Update Payment</button>
    </form>
@endsection
