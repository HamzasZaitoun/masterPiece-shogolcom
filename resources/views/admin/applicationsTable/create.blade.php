@extends('admin.source.template')

@section('content')
    <h1>Create Application</h1>
    <h2>Application form</h2>
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
    <form class="form" action="{{ route('admin.applications.store') }}" method="POST">
        @csrf
        <div class="select-container">
            {{-- <label for="user_id">User:</label> --}}
            <select class="select" name="user_id" required>
                <option value="">Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="select-container">
            {{-- <label for="job_id">Job:</label> --}}
            <select class="select" name="job_id" required>
                <option value="">Select Job</option>
                @foreach ($jobs as $job)
                    <option value="{{ $job->job_id }}">{{ $job->job_title }}</option>
                @endforeach
            </select>
        </div>
        <div class="select-container">
            {{-- <label for="application_status">Status:</label> --}}
            <select class="select" name="application_status" required>
                <option value="pending">Pending</option>
                <option value="accepted">Accepted</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
        <div></div>
        <div class="button-container">
            <button class="create-btn" type="submit">Add Application</button>
        </div>
    </form>
@endsection
