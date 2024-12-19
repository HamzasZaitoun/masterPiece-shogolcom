@extends('admin.source.template')
@section('content')
    <h1>Application Dashboard</h1>
    <div class="recent-orders">
        <div class="header-table">
            <h2 class="header-h2">Applications</h2>
            <button class="add-btn" onclick="location.href = '{{ route('admin.applications.create') }}';">Add Application</button>
        </div>
        <table id="applicationsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Job Name</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->application_id }}</td>
                        <td>{{ $application->user->name ?? 'N/A' }}</td>
                        <td>{{ $application->job->job_title ?? 'N/A' }}</td>
                        <td>{{ ucfirst($application->application_status) }}</td>
                        <td class="action">
                            <a href="{{ route('admin.applications.show', $application->application_id) }}"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.applications.edit', $application->application_id) }}"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.applications.destroy', $application->application_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
