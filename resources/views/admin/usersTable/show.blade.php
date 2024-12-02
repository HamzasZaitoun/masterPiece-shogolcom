@extends('admin.source.template')

<style>
    .user-details-table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
    }
    .user-details-table th,
    .user-details-table td {
        padding: 15px;
        text-align: left; /* Align text to the left for better readability */
        vertical-align: middle;
    }
    .user-details-table th {
        background-color: #f8f9fa;
        font-weight: bold;
        width: 30%; /* Adjust width for the label column */
    }
    .user-details-table td {
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
    <h2 class="text-center text-secondary mb-4">User Details</h2>

    <!-- User Data Table -->
    <table class="table user-details-table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{$user->id}}</td>
            </tr>
            <tr>
                <th>First Name</th>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{$user->last_name}}</td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td>{{$user->mobile_number}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <th>Profile Image</th>
                <td><img src="{{ asset('uploads/users/' . $user->profile_picture) }}" alt="Profile Image" class="img-fluid"></td>
            </tr>
            <tr>
                <th>Balance</th>
                <td>{{$user->balance}}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{$user->user_city}}</td>
            </tr>
            <tr>
                <th>Governate</th>
                <td>{{$user->user_governate}}</td> <!-- Assuming 'governate' is a column in the users table -->
            </tr>
            <tr>
                <th>Bio</th>
                <td>{{$user->bio}}</td>
            </tr>
            <tr>
                <th>Account Status</th>
                <td>{{$user->account_status}}</td>
            </tr>
            <tr>
                <th>SignUp Date</th>
                <td>{{$user->created_at}}</td>
            </tr>
            <tr>
                <th>Latest Update</th>
                <td>{{$user->updated_at}}</td>
            </tr>
            <tr>
                <th>Last Login</th>
                <td>{{$user->last_login}}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{$user->role}}</td>
            </tr>
        </tbody>
    </table>

    <!-- Action Buttons -->
    <div class="button-container">
        <button onclick="location.href='{{ route('admin.users.editUser', ['id' => $user->id]) }}'" class="edit-btn btn btn-primary btn-lg shadow-sm rounded-pill px-4 py-2 my-3">
            <i class="bi bi-pencil-square"></i> Edit User
        </button>
    </div>
</div>

@endsection
