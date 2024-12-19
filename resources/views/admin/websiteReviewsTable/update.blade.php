@extends('admin.source.template')

@section('content')
    <h2>Edit Review</h2>
    <form class="form" action="{{ route('admin.websiteReviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>User ID:</label>
        <input class="input" placeholder=""type="number" name="user_id" value="{{ $review->user_id }}" required>
        <label>Rating:</label>
        <input class="input" placeholder=""type="number" name="rating" value="{{ $review->rating }}" step="0.01" min="0" max="5" required>
        <label>Review Text:</label>
        <textarea class="input" name="review_text">{{ $review->review_text }}</textarea>
        <label>Is Approved:</label>
        <select name="is_approved">
            <option value="1" {{ $review->is_approved ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !$review->is_approved ? 'selected' : '' }}>No</option>
        </select>
        <label>Reply Text:</label>
        <textarea class="input" name="reply_text">{{ $review->reply_text }}</textarea>
        <button type="submit">Update</button>
    </form>
@endsection
