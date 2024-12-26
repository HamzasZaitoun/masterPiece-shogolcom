@extends('admin.source.template')
@section('content')
    <h2 class="text-center text-secondary mb-4">User Details</h2>
    {{-- 
    <div class="details-container">
        <h2 class="details-header text-secondary">{{ $user->name }} Details</h2>

        <!-- User Data Table -->
        <table class="details-table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ $user->last_name }}</td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td>{{ $user->mobile_number }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Profile Image</th>
                    <td><img src="{{ asset('uploads/users/' . $user->profile_picture) }}" alt="Profile Image"
                            class="img-fluid"></td>
                </tr>
                <tr>
                    <th>Balance</th>
                    <td>{{ $user->balance }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ $user->user_city }}</td>
                </tr>
                <tr>
                    <th>governorate</th>
                    <td>{{ $user->user_governorate }}</td> <!-- Assuming 'governorate' is a column in the users table -->
                </tr>
                <tr>
                    <th>Bio</th>
                    <td>{{ $user->bio }}</td>
                </tr>
                <tr>
                    <th>Account Status</th>
                    <td>{{ $user->account_status }}</td>
                </tr>
                <tr>
                    <th>SignUp Date</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th>Latest Update</th>
                    <td>{{ $user->updated_at }}</td>
                </tr>
                <tr>
                    <th>Last Login</th>
                    <td>{{ $user->last_login }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>{{ $user->role }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Action Buttons -->
        <div class="button-container">
            <button onclick="location.href='{{ route('admin.users.editUser', ['id' => $user->id]) }}'"
                class="edit-btn btn btn-primary btn-lg shadow-sm rounded-pill px-4 py-2 my-3">
                <i class="bi bi-pencil-square"></i> Edit User
            </button>
        </div>
    </div> --}}
    {{-- ---------------------------------------------------------------------------------------------- --}}
    <main class="main-profile">
        <div class="profile-head">
            <div class="profile-left">
                <img id="profile-image" src="{{ asset('uploads/users/' . $user->profile_picture) }}" alt="profile image">
                <div class="profile-info">
                    <h3 class="name">{{ $user->first_name }} {{ $user->last_name }}</h3>
                    <p class="headline">User ID: {{ $user->id }}</p>
                    <p class="headline">Email: {{ $user->email }}</p>
                    <p class="city">Mobile Number: {{ $user->mobile_number }}</p>
                </div>
            </div>
            <div class="profile-right">
                <p class="headline right-profile">Role: {{ $user->role }}</p>
                <p class="headline right-profile">Balance: {{ $user->balance }}</p>
                <p class="city">Account Status: {{ $user->account_status }}</p>
            </div>
        </div>
        <hr>
        <div class="bio">
            <div class="bio-header">
                <div class="bio-title">
                    <h4 class="name">Bio :</h4>
                </div>
            </div>
            <div class="bio-body">
                <p>
                    {{ $user->bio }}
                </p>
            </div>
        </div>
        <hr>
        <div class="bio">
            <div class="bio-header">
                <div class="bio-title">
                    <h4 class="name">Details :</h4>
                </div>
            </div>
            <div class="bio-body">
                <table>
                    <tr>
                        <th>governorate :</th>
                        <td>{{ $user->user_governorate }}</td>
                        <th>City :</th>
                        <td>{{ $user->user_city }}</td>
                    </tr>
                    <tr>
                        <th>SignUp Date :</th>
                        <td>{{ $user->created_at }}</td>
                        <th>Latest Update :</th>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                    <tr>
                        <th>Last Login :</th>
                        <td colspan="3">{{ $user->last_login }}</td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="button-container">
            <button onclick="location.href='{{ route('admin.users.editUser', ['id' => $user->id]) }}'"
                class="edit-btn btn btn-primary btn-lg shadow-sm rounded-pill px-4 py-2 my-3">
                <i class="bi bi-pencil-square"></i> Edit User
            </button>
        </div>
    </main>
@endsection
