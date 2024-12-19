@extends('admin.source.template')

@section('content')
    <h1>Create New Review</h1>
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
    <form class="form" action="{{ route('admin.usersReviews.store') }}" method="POST">
        @csrf

        <div class="select-container">
            {{-- <label for="application_id">Application:</label> --}}
            <select class="select" name="application_id" id="application_id" required>
                <option value="" disabled selected>Select an application</option>
                @foreach ($applications as $application)
                    <option value="{{ $application->application_id }}">{{ $application->application_id }}</option>
                @endforeach
            </select>
        </div>

        <div class="select-container">
            {{-- <label for="reviewer_id">Reviewer:</label> --}}
            <select class="select" name="reviewer_id" id="reviewer_id" required>
                <option value="" disabled selected>Select a reviewer</option>
                @foreach ($applications as $application)
                    <option value="{{ $application->user->id }}">{{ $application->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="select-container">
            {{-- <label for="reviewed_id">Reviewed:</label> --}}
            <select class="select" name="reviewed_id" id="reviewed_id" required>
                <option value="" disabled selected>Select a reviewed user</option>
                @foreach ($applications as $application)
                    @if ($application->job && $application->job->user)
                        <option value="{{ $application->job->user->id }}">
                            {{ $application->job->user->name }}
                        </option>
                    @else
                        <option value="" disabled>No reviewed user</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="input-container">
            {{-- <label for="rating">Rating:</label> --}}
            <input class="input" type="number" step="0.01" min="1" max="5" name="rating" id="rating"
                placeholder="Enter Rating (1-5)" required>
        </div>

        <div class="input-container">
            {{-- <label for="review_text">Review Text:</label> --}}
            <textarea class="input" name="review_text" id="review_text" rows="1" placeholder="Enter your review"></textarea>
        </div>
        <div></div>
        <div></div>
        <div class="button-container">
            <button class="create-btn" type="submit">Create Review</button>
        </div>
    </form>
@endsection
