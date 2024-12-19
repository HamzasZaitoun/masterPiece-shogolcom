@extends('admin.source.template')

@section('content')
    <h1>Create a New Review</h1>
    <h2>Review Form</h2>
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
    <form class="form" action="{{ route('admin.websiteReviews.store') }}" method="POST">
        @csrf
        <div>
            {{-- <label for="user_id">User ID:</label> --}}
            <input class="input" placeholder="User ID:"type="number" name="user_id" placeholder="Enter User ID" required>
        </div>

        <div>
            {{-- <label for="rating">Rating:</label> --}}
            <input class="input" placeholder="Rating:"type="number" name="rating" step="0.01" min="0" max="5" placeholder="Enter Rating (0-5)" required>
        </div>

        <div>
            {{-- <label for="review_text">Review Text:</label> --}}
            <textarea class="input" placeholder="Review Text:" name="review_text" placeholder="Enter Review Text"></textarea>
        </div>

        <div class="select-container">
            {{-- <label for="is_approved">Is Approved:</label> --}}
            <select class="select" name="is_approved">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div>
            {{-- <label for="reply_text">Reply Text:</label> --}}
            <textarea class="input" placeholder="Reply Text:" name="reply_text" placeholder="Enter Reply Text"></textarea>
        </div>
        <div></div>
        <div></div>
        <div class="button-container">
            <button class="create-btn" type="submit">Submit Review</button>
        </div>
    </form>
@endsection