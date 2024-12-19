@extends('admin.source.template')
@section('content')
    <h1>Application Details</h1>
    <div class="application-details">
        <p><strong>ID:</strong> {{ $application->application_id }}</p>
        <p><strong>User Name:</strong> {{ $application->user->name . ' ' . $application->user->last_name ?? 'N/A' }}</p>
        <p><strong>Job Title:</strong> {{ $application->job->job_title ?? 'N/A' }}</p>
        <p><strong>Status:</strong> {{ ucfirst($application->application_status) }}</p>
        <p><strong>Applied At:</strong> {{ $application->created_at ?? 'N/A' }}</p>
        <p><strong>Accepted At:</strong> {{ $application->accepted_at ?? 'N/A' }}</p>
        <p><strong>Completed At:</strong> {{ $application->completed_at ?? 'N/A' }}</p>
    </div>
    <button onclick="location.href='{{ route('admin.applications.index') }}';">Back to Applications</button>
@endsection
