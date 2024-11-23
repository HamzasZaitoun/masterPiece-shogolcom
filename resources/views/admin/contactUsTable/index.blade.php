@extends('admin.source.template')
@section('content')
<h1>Contact Messages</h1>
 <div class="recent-orders">
    <div class="header-table">
    <h2 class="header-h2">Messages</h2>
    </div>
    <table id="userTable">
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
                <a href="{{Route('admin.contactUs.contactDetails')}}"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>hamza</td>
            <td>saad</td>
            <td>Valid</td>
            <td class="action">
                <a href="{{Route('admin.contactUs.contactDetails')}}"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
 </div>
 </main>
@endsection