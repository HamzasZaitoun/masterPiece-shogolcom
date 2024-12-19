@extends('admin.source.template')

@section('content')
    <h1>Create New Payment</h1>
    <h2>Pyments form</h2>
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
    <form class="form" action="{{ route('admin.payments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            {{-- <label for="user_id">User ID</label> --}}
            <input class="input" placeholder="User ID"type="number" name="user_id" id="user_id" class="form-control" required>
        </div>
        <div class="form-group">
            {{-- <label for="job_id">Job ID</label> --}}
            <input class="input" placeholder="Job ID"type="number" name="job_id" id="job_id" class="form-control"
                required>
        </div>
        <div class="form-group select-container">
            {{-- <label for="payment_method">Payment Method</label> --}}
            <select class="select" name="payment_method" id="payment_method" class="form-control" required>
                <option value="" disabled selected>Payment method</option>
                <option value="cash">Cash</option>
                <option value="wallet">Wallet</option>
                <option value="bank_transfer">Bank Transfer</option>
                <option value="visa">Visa</option>
            </select>
        </div>
        <div class="form-group">
            {{-- <label for="net_payment">Net payment</label> --}}
            <input class="input" placeholder="Net payment"type="text" name="net_payment" id="net_payment"
                class="form-control" required>
        </div>
        <div class="form-group">
            {{-- <label for="platform_commission">Platform Commission</label> --}}
            <input class="input" placeholder="Platform Commission"type="text" name="platform_commission"
                id="platform_commission" class="form-control" required>
        </div>
        <div class="form-group select-container">
            {{-- <label for="payment_status">Payment Status</label> --}}
            <select class="select" name="payment_status" id="payment_status" class="form-control" required>
                <option value="" disabled selected>Paymentstatus</option>
                <option value="pending">Pending</option>
                <option value="escrow">Escrow</option>
                <option value="completed">Completed</option>
                <option value="refunded">Refunded</option>
            </select>
        </div>
        <div class="form-group">
            {{-- <label for="payment_amount">Payment Amount</label> --}}
            <input class="input" placeholder="Payment Amount"type="text" name="payment_amount" id="payment_amount"
                class="form-control" required>
        </div>
        <div class="form-group">
            {{-- <label for="transaction_id">Transaction ID</label> --}}
            <input class="input" placeholder="Transaction ID"type="text" name="transaction_id" id="transaction_id"
                class="form-control">
        </div>
        <div></div>
        <div></div>
        <div class="button-container">
            <button type="submit" class="create-btn">Add Payment</button>
        </div>
    </form>
@endsection
