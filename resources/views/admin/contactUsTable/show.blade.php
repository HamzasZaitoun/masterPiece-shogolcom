@extends('admin.source.template')

@section('content')
    <h1>Message Details</h1>
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
                Response
            </button>
        </div>
    </div>
@endsection