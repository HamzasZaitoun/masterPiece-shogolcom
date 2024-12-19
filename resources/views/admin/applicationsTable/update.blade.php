@extends('admin.source.template')

@section('content')
    <h1>Edit Application</h1>

    <form class="form" action="{{ route('admin.applications.update', $application->application_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="select-container">
            <select class="select" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $application->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="select-container">
            <select class="select" name="job_id" required>
                <option value="">Select Job</option>
                @foreach ($jobs as $job)
                    <option value="{{ $job->job_id }}" {{ $job->job_id == $application->job_id ? 'selected' : '' }}>
                        {{ $job->job_title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="select-container">
            <select class="select" name="application_status" required>
                <option value="pending" {{ $application->application_status == 'pending' ? 'selected' : '' }}>Pending
                </option>
                <option value="accepted" {{ $application->application_status == 'accepted' ? 'selected' : '' }}>Accepted
                </option>
                <option value="rejected" {{ $application->application_status == 'rejected' ? 'selected' : '' }}>Rejected
                </option>
            </select>
        </div>
        <div></div>
        <div class="button-container">
            <button class="create-btn" type="submit">Update Application</button>
        </div>
    </form>
@endsection
