@extends('admin.source.template')

@section('content')
    <h1>Review Details</h1>

    <p><strong>Reviewer ID:</strong> {{ $review->reviewer->name}}</p>
    <p><strong>Reviewed ID:</strong> {{ $review->reviewed->name }}</p>
    <p><strong>Rating:</strong> {{ $review->rating }}</p>
    <p><strong>Review Text:</strong> {{ $review->review_text ?? 'N/A' }}</p>
    <p><strong>Job ID:</strong> {{ $review->job_id }}</p>

    <a href="{{ route('admin.usersReviews.index') }}">Back to Reviews</a>
@endsection
