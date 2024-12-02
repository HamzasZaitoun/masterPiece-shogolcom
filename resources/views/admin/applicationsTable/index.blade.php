@extends('admin.source.template')
@section('content')
<h1>Application dashboard</h1>
 <div class="recent-orders">
    <div class="header-table">
    <h2 class="header-h2">Applications</h2>
    </div>
    <table id="applicationsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Job ID</th>
                <th>Stutus</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>23</td>
            <td>Pending</td>
            <td class="action">
                <a href="{{Route('admin.applications.applicationDetails')}}"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>2</td>
            <td>16</td>
            <td>Valid</td>
            <td class="action">
                <a href="{{Route('admin.applications.applicationDetails')}}"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
 </div>
 </main>
@endsection