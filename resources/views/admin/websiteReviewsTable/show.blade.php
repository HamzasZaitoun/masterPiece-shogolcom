@extends('admin.source.template')

@section('content')
    <h2>Review Details</h2>
    <p><strong>ID:</strong> {{ $review->id }}</p>
    <p><strong>User Name:</strong> {{ $review->user->name }}</p>
    <p><strong>Rating:</strong> {{ $review->rating }}</p>
    <p><strong>Review Text:</strong> {{ $review->review_text }}</p>
    <p><strong>Is Approved:</strong> {{ $review->is_approved ? 'Yes' : 'No' }}</p>
    <p><strong>Reply Text:</strong> {{ $review->reply_text }}</p>
    <p><strong>Created At:</strong> {{ $review->created_at }}</p>
    <p><strong>Updated At:</strong> {{ $review->updated_at }}</p>

    <a href="{{ route('admin.websiteReviews.index') }}">Back to List</a>
@endsection
