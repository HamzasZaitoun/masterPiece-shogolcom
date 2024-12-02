@extends('admin.source.template')
@section('content')
<h1>Jobs dashboard</h1>
 <div class="recent-orders">
    <div class="header-table">
    <h2 class="header-h2">Jobs</h2>
    <button class="add-btn" onclick="location.href = '{{Route('admin.jobs.addJob')}}';">Add Job</button>
    </div>
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
                    <a href="{{ route('admin.jobs.jobDetails', ['id' => $job->job_id]) }}"><i
                            class="bi bi-eye"></i>
                    </a>
                    <form id="deleteCategoryForm" action="{{ route('admin.categories.deleteCategory', ['id' => $job->job_id]) }}" method="POST" class="d-inline">
                        @csrf
                        @Method('DELETE')
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                            title="Delete Job" onclick="confirmDelete(this)">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
 </div>
</main>
@endsection
