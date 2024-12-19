@extends('admin.source.template')
@section('content')
    <form class="form"action="{{ route('admin.usersReviews.update', $review) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- <label for="reviewer_id">Reviewer ID:</label> --}}
        <input class="input" placeholder=""type="number" name="reviewer_id" value="{{ $review->reviewer_id }}" required>

        {{-- <label for="reviewed_id">Reviewed ID:</label> --}}
        <input class="input" placeholder=""type="number" name="reviewed_id" value="{{ $review->reviewed_id }}" required>

        {{-- <label for="rating">Rating:</label> --}}
        <input class="input" placeholder=""type="number" step="0.1" max="5" min="0" name="rating"
            value="{{ $review->rating }}" required>

        {{-- <label for="review_text">Review Text:</label> --}}
        <textarea class="input" name="review_text">{{ $review->review_text }}</textarea>

        {{-- <label for="job_id">Job ID:</label> --}}
        <input class="input" placeholder=""type="number" name="job_id" value="{{ $review->job_id }}" required>
        <div></div>
        <div></div>

        <button class="edit-save-btn"type="submit">Update Review</button>
    </form>
@endsection
