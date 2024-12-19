@extends('admin.source.template')

@section('content')
    <h1>Edit Job</h1>
    @if ($errors->all())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form" action="{{ route('admin.jobs.updateJob', ['id' => $job->job_id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="input-field">
            {{-- <label for="job_title">Job Title:</label> --}}
            <input class="input" placeholder=""type="text" id="job_title" name="job_title" value="{{ $job->job_title }}" required>
        </div>
        <div class="input-field">
            {{-- <label for="job_description">Job Description:</label> --}}
            <textarea class="input" id="job_description" name="job_description" required>{{ $job->job_description }}</textarea>
        </div>
        <div class="input-field">
            {{-- <label for="job_governate">Job Governate:</label> --}}
            <input class="input" placeholder=""type="text" id="job_governate" name="job_governate" value="{{ $job->job_governate }}" required>
        </div>
        <div class="input-field">
            {{-- <label for="job_city">Job City:</label> --}}
            <input class="input" placeholder=""type="text" id="job_city" name="job_city" value="{{ $job->job_city }}" required>
        </div>
        <div class="select-container">
            {{-- <label for="job_type">Job Type:</label> --}}
            <select class="select" id="job_type" name="job_type" required>
                <option value="day" {{ $job->job_type === 'day' ? 'selected' : '' }}>Day</option>
                <option value="month" {{ $job->job_type === 'month' ? 'selected' : '' }}>Month</option>
                <option value="project" {{ $job->job_type === 'project' ? 'selected' : '' }}>Project</option>
            </select>
        </div>
        <div class="input-field">
            {{-- <label for="payment_amount">Payment Amount:</label> --}}
            <input class="input" placeholder=""type="number" id="payment_amount" name="payment_amount" value="{{ $job->payment_amount }}" required>
        </div>
        <div class="select-container">
            {{-- <label for="is_urgent">Urgent:</label> --}}
            <select class="select" id="is_urgent" name="is_urgent" required>
                <option value="1" {{ $job->is_urgent ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$job->is_urgent ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="input-field">
            {{-- <label for="post_deadline">Post Deadline:</label> --}}
            <input class="input" placeholder=""type="date" id="post_deadline" name="post_deadline" value="{{ $job->post_deadline }}" required>
        </div>
        <div class="input-field">
            {{-- <label for="start_date">Start Date:</label> --}}
            <input class="input" placeholder=""type="date" id="start_date" name="start_date" value="{{ $job->start_date }}" required>
        </div>
        <div class="select-container">
            {{-- <label for="job_status">Job Status:</label> --}}
            <select class="select" id="job_status" name="job_status" required>
                <option value="open" {{ $job->job_status === 'open' ? 'selected' : '' }}>Open</option>
                <option value="closed" {{ $job->job_status === 'closed' ? 'selected' : '' }}>Closed</option>
                <option value="completed" {{ $job->job_status === 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $job->job_status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <div class="input-field">
            {{-- <label for="job_media">Job Media:</label> --}}
            <input class="input" placeholder=""type="file" id="job_media" name="job_media">
        </div>
        <div></div>
        <div></div>
        <button class="edit-save-btn" type="submit">Update</button>
    </form>
@endsection
