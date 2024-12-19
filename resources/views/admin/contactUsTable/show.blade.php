@extends('admin.source.template')

@section('content')
<h1>Message Details</h1>
<div class="message-details">
    <p><strong>ID:</strong> {{ $contact->contact_id }}</p>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Category:</strong> {{ $contact->category }}</p>
    <p><strong>Message:</strong> {{ $contact->message }}</p>
    <p><strong>Status:</strong> {{ $contact->status }}</p>
    <p><strong>Response:</strong> {{ $contact->response ?? 'No response yet' }}</p>
    <p><strong>Responded At:</strong> {{ $contact->responded_at ?? 'Not Responded' }}</p>
    <a href="{{ route('admin.contactUs.index') }}" class="btn btn-primary">Back</a>
</div>
@endsection
