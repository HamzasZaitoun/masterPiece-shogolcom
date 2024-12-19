@extends('admin.source.template')

<style>
    .job-details-table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
    }
    .job-details-table th,
    .job-details-table td {
        padding: 15px;
        text-align: left; /* Align text to the left for better readability */
        vertical-align: middle;
    }
    .job-details-table th {
        background-color: #f8f9fa;
        font-weight: bold;
        width: 30%; /* Adjust width for the label column */
    }
    .job-details-table td {
        background-color: #fff;
        border: 1px solid #ddd;
        text-align: center;
    }
    .button-container {
        text-align: center;
        margin-top: 20px;
    }
    .button-container button {
        margin: 0 10px;
    }
    img {
        display: inline !important;
        max-height: 200px;
        max-width: 200px;
    }
</style>

@section('content')

<div>
    <h2 class="text-center text-secondary mb-4">Job Details</h2>

    <!-- Job Data Table -->
    <table class="table job-details-table table-bordered">
        <tbody>
            <tr>
                <th>Job ID</th>
                <td>{{ $job->job_id }}</td>
            </tr>
            <tr>
                <th>Posted By</th>
                <td>{{ $job->user->name . ' ' .$job->user->last_name  }}</td> <!-- Assuming the 'name' attribute exists in the 'users' table -->
            </tr>
            <tr>
                <th>Job Title</th>
                <td>{{ $job->job_title }}</td>
            </tr>
            <tr>
                <th>Job Description</th>
                <td>{{ $job->job_description }}</td>
            </tr>
            <tr>
                <th>Job Governate</th>
                <td>{{ $job->job_governate }}</td>
            </tr>
            <tr>
                <th>Job City</th>
                <td>{{ $job->job_city }}</td>
            </tr>
            <tr>
                <th>Job Location</th>
                <td>{{ $job->job_detailed_location }}</td>
            </tr>
            <tr>
                <th>Job Type</th>
                <td>{{ ucfirst($job->job_type) }}</td>
            </tr>
            <tr>
                <th>Payment Amount</th>
                <td>${{ number_format($job->payment_amount, 2) }}</td>
            </tr>
            <tr>
                <th>Job Duration (Days)</th>
                <td>{{ $job->job_duration ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Urgent</th>
                <td>{{ $job->is_urgent ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>Post Deadline</th>
                <td>{{ $job->post_deadline }}</td>
            </tr>
            <tr>
                <th>Max Applicants</th>
                <td>{{ $job->max_applicants }}</td>
            </tr>
            <tr>
                <th>Start Date</th>
                <td>{{ $job->start_date }}</td>
            </tr>
            <tr>
                <th>Job Media</th>
                <td>
                    @if($job->job_media)
                        <img src="{{ asset('uploads/jobs/' . $job->job_media) }}" alt="Job Media" class="img-fluid">
                    @else
                        N/A
                    @endif
                </td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $job->category->category_name }}</td>
            </tr>
            <tr>
                <th>Job Status</th>
                <td>{{ ucfirst($job->job_status) }}</td>
            </tr>
            <tr>
                <th>Payment Status</th>
                <td>{{ ucfirst($job->payment_status) }}</td>
            </tr>
            <tr>
                <th>Job Visibility</th>
                <td>{{ ucfirst($job->job_visibility) }}</td>
            </tr>
            <tr>
                <th>Priority Level</th>
                <td>{{ $job->priority_level }}</td>
            </tr>
            <tr>
                <th>Is Custom Category</th>
                <td>{{ $job->is_custom_category ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>Custom Category</th>
                <td>{{ $job->custom_category ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Number of Workers</th>
                <td>{{ $job->number_of_workers }}</td>
            </tr>
            <tr>
                <th>Cancellation Reason</th>
                <td>{{ $job->cancellation_reason ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $job->created_at }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $job->updated_at }}</td>
            </tr>
            <tr>
                <th>deleted At</th>
                <td>{{ $job->deleted_at }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Action Buttons -->
    <div class="button-container">
        <button onclick="location.href='{{ route('admin.jobs.editJob', ['id' => $job->job_id]) }}'" class="edit-btn btn btn-primary btn-lg shadow-sm rounded-pill px-4 py-2 my-3">
            <i class="bi bi-pencil-square"></i> Edit Job
        </button>
    </div>
</div>

@endsection
