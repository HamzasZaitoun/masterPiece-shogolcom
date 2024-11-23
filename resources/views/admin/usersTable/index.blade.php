@extends('admin.source.template')
@section('content')
<h1>Users dashboard</h1>
 <div class="recent-orders">
    <div class="header-table">
    <h2 class="header-h2">Users</h2>
    <button class="add-btn" onclick="location.href = '{{Route('admin.users.addUser')}}';">Add user</button>
    </div>
    <table id="userTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Account status</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>sdad</td>
            <td>loui</td>
            <td>Valid</td>
            <td class="action">
                <a href=""><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>hamza</td>
            <td>saad</td>
            <td>Valid</td>
            <td class="action">
                <a href=""><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
 </div>
 </main>
@endsection