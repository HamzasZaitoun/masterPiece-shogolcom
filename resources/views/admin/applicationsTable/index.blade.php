@extends('admin.source.template')
@section('content')
    <h1>Application Dashboard</h1>
    <div class="recent-orders">
        <div class="header-table">
            <h2 class="header-h2">Applications</h2>
            <button class="add-btn" onclick="location.href = '{{ route('admin.applications.create') }}';">Add
                Application</button>
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
                        <td>{{ $application->user->first_name ?? 'N/A' }}</td>
                        <td>{{ $application->job->job_title ?? 'N/A' }}</td>
                        <td>{{ ucfirst($application->application_status) }}</td>
                        <td class="action">
                            <div class="flex">
                                {{-- <a href="{{ route('admin.applications.show', $application->application_id) }}"><i
                                        class="bi bi-eye"></i></a> --}}
                                <a href="{{ route('admin.applications.show', $application->application_id) }}"
                                    class="view-button" title="View Details">
                                    <svg class="view-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        aria-hidden="true" focusable="false">
                                        <path
                                            d="M12 4.5C7.05 4.5 3.03 8.09 1.5 12c1.53 3.91 5.55 7.5 10.5 7.5s8.97-3.59 10.5-7.5C20.97 8.09 16.95 4.5 12 4.5zm0 11.25a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5zm0-6a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5z"
                                            fill="white" />
                                    </svg>
                                    <span class="view-text">View</span>
                                </a>
                                {{-- <a href="{{ route('admin.applications.edit', $application->application_id) }}"><i class="bi bi-pencil"></i></a> --}}
                                <form action="{{ route('admin.applications.destroy', $application->application_id) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-button"type="submit">
                                        <svg class="delete-svgIcon" viewBox="0 0 448 512">
                                            <path
                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
