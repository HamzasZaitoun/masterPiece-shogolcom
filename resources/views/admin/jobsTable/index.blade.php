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
                <th>City</th>
                <th>Category</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Developer</td>
            <td>Amman</td>
            <td>IT</td>
            <td class="action">
                <a href=""><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Scrum master</td>
            <td>Amman</td>
            <td>IT</td>
            <td class="action">
                <a href=""><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
 </div>
</main>
@endsection