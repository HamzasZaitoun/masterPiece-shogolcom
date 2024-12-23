@extends('admin.source.template')
@section('content')
    <h1>Application Details</h1>
    {{-- <div class="application-details">
        <p><strong>ID:</strong> {{ $application->application_id }}</p>
        <p><strong>User Name:</strong> {{ $application->user->name . ' ' . $application->user->last_name ?? 'N/A' }}</p>
        <p><strong>Job Title:</strong> {{ $application->job->job_title ?? 'N/A' }}</p>
        <p><strong>Status:</strong> {{ ucfirst($application->application_status) }}</p>
        <p><strong>Applied At:</strong> {{ $application->created_at ?? 'N/A' }}</p>
        <p><strong>Accepted At:</strong> {{ $application->accepted_at ?? 'N/A' }}</p>
        <p><strong>Completed At:</strong> {{ $application->completed_at ?? 'N/A' }}</p>
    </div>
    <button onclick="location.href='{{ route('admin.applications.index') }}';">Back to Applications</button> --}}
    <div class="category-container">
        <div class="category">
            {{-- <Small>{{ $application->user->name}} Application</Small> --}}
            <span class="mt-4">{{ $application->user->name . ' ' . $application->user->last_name ?? 'N/A' }} #
                {{ $application->application_id }}</span>
            <table table class="job-table Tapplication">
                <tr>
                    <th>Applied for :</th>
                    <td>{{ $application->job->job_title ?? 'N/A' }}</td>
                    <th>Status :</th>
                    <td>{{ ucfirst($application->application_status) }}</td>
                </tr>
                <tr>
                    <th>Applied At:</th>
                    <td>{{ $application->created_at ?? 'N/A' }}</td>
                    <th>Accepted At:</th>
                    <td>{{ $application->accepted_at ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Completed At:</th>
                    <td>{{ $application->completed_at ?? 'N/A' }}</td>
                </tr>
            </table>
            <div class="button-container fixed-bottom">
                <button onclick="location.href='{{ route('admin.applications.edit', $application->application_id) }}"
                    class="edit-btn btn btn-primary btn-lg shadow-sm rounded-pill px-4 py-2 my-3 fixed-bottom">
                    <i class="bi bi-pencil-square"></i> Edit application
                </button>
            </div>
        </div>
    </div>
@endsection
