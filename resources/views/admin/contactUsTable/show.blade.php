@extends('admin.source.template')

@section('content')
    <h1>Message Details</h1>
    {{-- <div class="message-details">
        <p><strong>ID:</strong> {{ $contact->contact_id }}</p>
        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Category:</strong> {{ $contact->category }}</p>
        <p><strong>Message:</strong> {{ $contact->message }}</p>
        <p><strong>Status:</strong> {{ $contact->status }}</p>
        <p><strong>Response:</strong> {{ $contact->response ?? 'No response yet' }}</p>
        <p><strong>Responded At:</strong> {{ $contact->responded_at ?? 'Not Responded' }}</p>
        <a href="{{ route('admin.contactUs.index') }}" class="btn btn-primary">Back</a>
    </div> --}}

    <div class="testimonial-card">
        <div class="testimonial-header">
            <div class="testimonial-info">
                <h3 class="testimonial-name">{{ $contact->name }}</h3>
                <p class="testimonial-role">{{ $contact->email }}</p>
            </div>
        </div>
        <div class="testimonial-body">
            <p>
                {{ $contact->message }}
            </p>
            <p class="testimonial-role">Status: {{ $contact->status }}</p>
            <p class="testimonial-role">Category: {{ $contact->category }}</p>
        </div>
    </div>
    <div class="testimonial-card">
        <div class="testimonial-header">
            <div class="testimonial-info">
                <h3 class="testimonial-name">Response message :</h3>
            </div>
        </div>
        <div class="testimonial-body">
            <p>
                {{ $contact->response ?? 'No response yet' }}
            </p>
            <p class="testimonial-role">Responded At: {{ $contact->responded_at ?? 'Not Responded' }}</p>

        </div>
        <div class="button-container">
            <button onclick="location.href='{{ route('admin.contactUs.edit', $contact->contact_id) }}'"
                class="edit-btn btn btn-primary btn-lg shadow-sm rounded-pill px-4 py-2 my-3">
                <i class="bi bi-pencil-square"></i> Edit
            </button>
        </div>
    </div>
@endsection
