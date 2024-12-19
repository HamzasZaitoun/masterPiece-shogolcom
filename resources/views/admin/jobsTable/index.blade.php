@extends('admin.source.template')
@section('content')
    <h1>Jobs dashboard</h1>
    <div class="recent-orders">
        <div class="header-table">
            <h2 class="header-h2">Jobs</h2>
            <button class="add-btn" onclick="location.href = '{{ Route('admin.jobs.addJob') }}';">Add Job</button>
        </div>
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
        <table id="jobTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Job title</th>
                    <th>Job description</th>
                    <th>Category</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->job_id }}</td>
                        <td>{{ $job->job_title }}</td>
                        <td>{{ $job->job_description }}</td>
                        <!-- Fetching category name from the relationship -->
                        <td>{{ $job->category->category_name }}</td>

                        <td class="action">
                            <a href="{{ route('admin.jobs.jobDetails', ['id' => $job->job_id]) }}"><i class="bi bi-eye"></i>
                            </a>
                            <form action="{{ route('admin.jobs.deleteJob', ['id' => $job->job_id]) }}" method="POST"
                                style="display:inline;">
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
    </main>
@endsection
