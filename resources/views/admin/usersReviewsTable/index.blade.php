@extends('admin.source.template')
@section('content')
    <h1>Users Reviews Dashboard</h1>

    <div class="recent-orders">
        <div class="header-table">
            <h2 class="header-h2">Reviews</h2>
            <button class="add-btn" onclick="location.href='{{ route('admin.usersReviews.create') }}';">
                Add Review
            </button>
        </div>
        <table id="userReviewsTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reviewer ID</th>
                    <th>Reviewed ID</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->review_id }}</td>
                        <td>{{ $review->application->user->name }}</td>
                        {{-- <td>{{ $applications->job->user->name }}</td> --}}
                        <td>{{ $review->rating }}</td>
                        <td class="action">
                            <a href="{{ route('admin.usersReviews.show', $review->review_id) }}"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.usersReviews.edit', $review->review_id) }}">Edit</a>
                            <form action="{{ route('admin.usersReviews.destroy', $review->review_id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"class="delete-btn" onclick="return confirm('Are you sure?')"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
