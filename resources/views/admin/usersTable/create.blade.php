@extends('admin.source.template')
@section('content')
    <h1>Users dashboard</h1>
    <h2>Add User</h2>
    <form id="addUserForm" action="{{ route('admin.users.storeUser') }}" method="POST">
        @csrf
        <div>
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" required>
        </div>
        <div>
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" required>
        </div>
        <div>
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        
       
        <div>
            <label for="mobileNumber">Mobile Number</label>
            <input type="text" id="mobileNumber" name="mobileNumber" required>
        </div>
        
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="profilePicture">Profile Picture</label>
            <input type="file" id="profilePicture" name="profilePicture">
        </div>
        <div>
            <label for="balance">balance</label>
            <input type="number" id="balance" name="balance" min="0"required>
        </div>
        <div>
            <label for="city">City</label>
            <input type="text" id="city" name="city">
        </div>
        <div>
            <label for="bio">Bio</label>
            <input type="text" id="bio" name="bio">
        </div>
        <div>
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <div>
            <label for="accountStatus">Account Status</label>
            <select id="accountStatus" name="accountStatus" required>
                <option value="" disabled selected>Select Account Status</option>
                <option value="active">Active</option>
                <option value="suspended">Suspended</option>
                <option value="banned">Banned</option>
            </select>
        </div>
        
        <div class="button-container">
            <button type="submit">Add</button>
        </div>
    </form>


    </main>
@endsection
