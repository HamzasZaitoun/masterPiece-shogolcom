@extends('admin.source.template')
@section('content')
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
    <form class="form"action="{{ route('admin.usersReviews.update', $review) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- <label for="reviewer_id">Reviewer ID:</label> --}}
        <input class="input" placeholder="{{ $review->reviewer_id }}"type="number" name="reviewer_id"
            value="{{ $review->reviewer_id }}" required>

        {{-- <label for="reviewed_id">Reviewed ID:</label> --}}
        <input class="input" placeholder="{{ $review->reviewed_id }}"type="number" name="reviewed_id"
            value="{{ $review->reviewed_id }}" required>

        {{-- <label for="rating">Rating:</label> --}}
        <input class="input" placeholder="{{ $review->rating }}"type="number" step="0.1" max="5" min="0"
            name="rating" value="{{ $review->rating }}" required>

        {{-- <label for="review_text">Review Text:</label> --}}
        <textarea class="input" name="review_text">{{ $review->review_text }}</textarea>

        {{-- <label for="job_id">Job ID:</label> --}}
        <input class="input" placeholder="Job ID: {{ $review->applications->job_id }}"type="number" name="job_id"
            value="{{ $review->applications->job_id }}" required>

        <input class="input" placeholder="Application ID: {{ $review->application_id }}"type="number"
            name="application_id" value="{{ $review->application_id }}" required>

        <div></div>

        <button class="edit-save-btn"type="submit">Update Review</button>
    </form>
@endsection
