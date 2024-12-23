@extends('admin.source.template')

@section('content')
    <h1>Reviews Dashboard</h1>
    <div class="recent-orders">
        <div class="header-table">
            <h2 class="header-h2">Reviews</h2>
            <button class="add-btn" onclick="location.href = '{{ Route('admin.websiteReviews.create') }}';">Add
                Review</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->rating }}</td>
                        <td class="action">
                            <a href="{{ route('admin.websiteReviews.show', $review) }}"><i class="bi bi-eye"></i></a>
                            {{-- <a href="{{ route('admin.websiteReviews.edit', $review) }}">Edit</a> --}}
                            <form action="{{ route('admin.websiteReviews.destroy', $review) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"class="delete-btn"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
