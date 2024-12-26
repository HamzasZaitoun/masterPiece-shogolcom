@extends('admin.source.template')
@section('content')
    <h2 class="text-center text-secondary mb-4">Job Details</h2>
    {{-- <div class="details-container">
        <h2 class="details-header text-secondary">Posted By: {{ $job->user->name . ' ' . $job->user->last_name }}</h2>
        <table class="details-table">
            <tbody>
                <tr>
                    <th>Job ID</th>
                    <td class="text-danger">{{ $job->job_id }}</td>
                </tr>
                <tr>
                    <th>Posted By</th>
                    <td>{{ $job->user->name . ' ' . $job->user->last_name }}</td>
                    <!-- Assuming the 'name' attribute exists in the 'users' table -->
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
                    <th>Job governorate</th>
                    <td>{{ $job->job_governorate }}</td>
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
                        @if ($job->job_media)
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
            <button onclick="location.href='{{ route('admin.jobs.editJob', ['id' => $job->job_id]) }}'"
                class="edit-btn btn btn-primary btn-lg shadow-sm rounded-pill px-4 py-2 my-3">
                <i class="bi bi-pencil-square"></i> Edit Job
            </button>
        </div>
    </div> --}}
    {{-- ------------------------------------------------ --}}
    <main class="job-details-container">
        <div class="job-header">
            <div class="job-profile">
                <img id="job-profile-image" src="{{ asset('uploads/jobs/' . $job->job_media) }}" alt="Profile Image">
                <div class="job-info">
                    <h3 class="job-name">{{ $job->job_title }} ({{ $job->job_id }})</h3>
                    <span>Posted By : {{ $job->user->first_name . ' ' . $job->user->last_name }}</span>
                </div>
            </div>
        </div>
        <hr>
        <div class="job-summary">
            <h4 class="section-title">Job Information</h4>
            <table class="job-table">
                <tr>
                    <th>governorate:</th>
                    <td>{{ $job->job_governorate }}</td>
                    <th>City:</th>
                    <td>{{ $job->job_city }}</td>
                </tr>
                <tr>
                    <th>Job location:</th>
                    <td>{{ $job->job_detailed_location }}</td>
                    <th>Job type:</th>
                    <td>{{ ucfirst($job->job_type) }}</td>
                </tr>
                <tr>
                    <th>Payment amount :</th>
                    <td>${{ number_format($job->payment_amount, 2) }}</td>
                    <th>Job duration :</th>
                    <td>{{ $job->job_duration ?? 'N/A' }} (Days)</td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="job-bio">
            <h4 class="section-title">Job description</h4>
            <p class="bio-text">{{ $job->job_description }}</p>
        </div>
        <hr>
        <div class="job-additional-details">
            <h4 class="section-title">Details</h4>
            <table table class="job-table">
                <tr>
                    <th>Urgent :</th>
                    <td>{{ $job->is_urgent ? 'Yes' : 'No' }}</td>
                    <th>Post deadline :</th>
                    <td>{{ $job->post_deadline }}</td>
                </tr>
                <tr>
                    <th>priority level :</th>
                    <td>{{ $job->priority_level }}</td>
                    <th>Posted by:</th>
                    <td>{{ $job->user->name . ' ' . $job->user->last_name }}</td>
                </tr>
                <tr>
                    <th>Job status:</th>
                    <td>{{ ucfirst($job->job_status) }}</td>
                    <th>Payment status:</th>
                    <td>{{ ucfirst($job->payment_status) }}</td>
                </tr>
                <tr>
                    <th>Max applicants:</th>
                    <td>{{ $job->max_applicants }}</td>
                    <th>Number of workers:</th>
                    <td>{{ $job->number_of_workers }}</td>
                </tr>
                <tr>
                    <th>Start date:</th>
                    <td>{{ $job->start_date }}</td>
                    <th>Category:</th>
                    <td>{{ $job->category->category_name }}</td>
                </tr>
                <tr>
                    <th>Is custom category:</th>
                    <td>{{ $job->is_custom_category ? 'Yes' : 'No' }}</td>
                    <th>Custom category :</th>
                    <td>{{ $job->custom_category ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Cancellation reason:</th>
                    <td>{{ $job->cancellation_reason ?? 'N/A' }}</td>
                    <th>Created at :</th>
                    <td>{{ $job->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated at:</th>
                    <td>{{ $job->updated_at }}</td>
                    <th>Deleted at :</th>
                    <td>{{ $job->deleted_at }}</td>
                </tr>
            </table>
        </div>
        <div class="button-container">
            <button onclick="location.href='{{ route('admin.jobs.editJob', ['id' => $job->job_id]) }}'"
                class="edit-btn btn btn-primary btn-lg shadow-sm rounded-pill px-4 py-2 my-3">
                <i class="bi bi-pencil-square"></i> Edit Job
            </button>
        </div>
    </main>
@endsection
