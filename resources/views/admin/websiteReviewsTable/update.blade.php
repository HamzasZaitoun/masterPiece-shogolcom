@extends('admin.source.template')

@section('content')
    <h2>Edit Review</h2>
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
    <form class="form" action="{{ route('admin.websiteReviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input class="input"type="number" name="user_id"value="{{ $review->user_id }}" hidden>
        <input class="input"type="number" name="rating" value="{{ $review->rating }}" hidden>
        <div class="select-container">
            <label>Is Approved:</label>
            <select class="select" name="is_approved">
                <option value="1" {{ $review->is_approved ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $review->is_approved ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div>
            <label>Reply Text:</label>
            <textarea class="input" name="reply_text">{{ $review->reply_text }}</textarea>
        </div>
        <div></div>
        <div></div>
        <div class="button-container">
            <button class="create-btn" type="submit">Submit</button>
        </div>
    </form>
@endsection