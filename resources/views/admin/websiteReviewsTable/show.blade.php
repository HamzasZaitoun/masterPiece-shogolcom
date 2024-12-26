@extends('admin.source.template')

@section('content')
    <h2>Review Details</h2>
    {{-- <p><strong>ID:</strong> {{ $review->id }}</p>
    <p><strong>User Name:</strong> {{ $review->user->name }}</p>
    <p><strong>Rating:</strong> {{ $review->rating }}</p>
    <p><strong>Review Text:</strong> {{ $review->review_text }}</p>
    <p><strong>Is Approved:</strong> {{ $review->is_approved ? 'Yes' : 'No' }}</p>
    <p><strong>Reply Text:</strong> {{ $review->reply_text }}</p>
    <p><strong>Created At:</strong> {{ $review->created_at }}</p>
    <p><strong>Updated At:</strong> {{ $review->updated_at }}</p>

    <a href="{{ route('admin.websiteReviews.index') }}">Back to List</a> --}}

    <div class="testimonial-card">
        <div class="testimonial-header">
            <img class="testimonial-image" src="{{ asset('uploads/users/' . $review->user->profile_picture) }}"
                alt="User Image">
            <div class="testimonial-info">
                <h3 class="testimonial-name">{{ $review->user->first_name }} {{ $review->user->last_name }}</h3>
                {{-- <p class="testimonial-role">Created At: {{ $review->created_at }}</p> --}}
            </div>
        </div>
        <div class="testimonial-rating">
            @for ($i = 1; $i <= $review->rating; $i++)
                ⭐
            @endfor
        </div>
        <div class="testimonial-body">
            <p>
                "{{ $review->review_text }}"
            </p>
            <p class="testimonial-role">Is Approved: {{ $review->is_approved ? 'Yes' : 'No' }}</p>
            <p class="testimonial-role">Created At: {{ $review->created_at }}</p>
            <p class="testimonial-role">Updated At: {{ $review->updated_at }}</p>

        </div>
    </div>
    <div class="testimonial-card">
        <div class="testimonial-header">
            <div class="testimonial-info">
                <h3 class="testimonial-name">Reply message :</h3>
            </div>
        </div>
        <div class="testimonial-body">
            <p>
                "{{ $review->reply_text }}"
            </p>
        </div>
        <div class="button-container">
            <button onclick="location.href='{{ route('admin.websiteReviews.edit', $review) }}'"
                class="edit-btn btn btn-primary btn-lg shadow-sm rounded-pill px-4 py-2 my-3">
                <i class="bi bi-pencil-square"></i> Edit review
            </button>
        </div>
    </div>
@endsection
