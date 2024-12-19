@extends('admin.source.template')

@section('content')
    <h1>Payments Dashboard</h1>
    <div class="recent-orders">
        <div class="header-table">
            <h2 class="header-h2">Payments</h2>
            <button class="add-btn" onclick="location.href = '{{ Route('admin.payments.create') }}';">Add Payment</button>
           
        </div>
        <table id="paymentTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Job ID</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->user_id }}</td>
                        <td>{{ $payment->job_id }}</td>
                        <td>{{ ucfirst($payment->payment_status) }}</td>
                        <td class="action">
                            <a href="{{ route('admin.payments.show', $payment->id) }}" title="View"><i
                                    class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.payments.edit', $payment->id) }}" title="Edit"><i
                                    class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border:none;background:none;" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
