@extends('admin.source.template')
@section('content')
    <h1>{{ $user->first_name . ' ' . $user->last_name }} profile</h1>
    {{-- <div class="profile-container">
        <div class="row">
            <img src="assets/images/profile-2.jpg" alt="Profile Image" class="profile-image">
            <button class="edit-profle-btn">Edit Profile</button>
        </div>
        <div class="user-info">
            <p class="user-name">John Doe</p>
            <p></p>
            <p class="user-headline">Software Engineer at TechCorp</p>
            <p class="user-role">Role: admin</p>
            <p class="user-phone">Phone: +962 456 7890</p>
        </div>
    </div> --}}
   
    <div class="admin-container">
        <div class="admin-row">
            <div class="admin-col-4">
                <!-- Profile picture card -->
                <div class="admin-card admin-profile-card">
                    <div class="admin-card-body admin-text-center">
                        <!-- Profile picture image -->
                        <img class="admin-profile-img admin-rounded-circle"
                            src="{{ asset('uploads/users/' . $user->profile_picture) }}" alt="Admin Profile Picture">
                        <!-- Profile picture bio -->
                        <div class="admin-bio">
                            <h3>{{ $user->first_name . ' ' . $user->last_name }}</h3><br>
                            <h3>About :</h3>
                            <p>{{ $user->bio }}</p>
                        </div>
                        {{-- <button class="admin-btn admin-btn-primary" type="button">Upload New Image</button> --}}
                    </div>
                </div>
            </div>
            <div class="admin-col-8">
                <div class="admin-card">
                    <div class="admin-card-header">Account Details</div>
                    <div class="admin-card-body">
                        <form>
                            <div class="admin-row">
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminFirstName">First Name</label>
                                    <input disabled class="admin-input" id="adminFirstName" type="text"
                                        placeholder="Enter your first name" value="{{ $user->first_name }}">
                                </div>
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminLastName">Last Name</label>
                                    <input disabled class="admin-input" id="adminLastName" type="text"
                                        placeholder="Enter your last name" value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="admin-row">
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminOrgName">city</label>
                                    <input disabled class="admin-input" id="adminOrgName" type="text"
                                        placeholder="Enter organization" value="{{ $user->user_governorate }}">
                                </div>
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminLocation">Govermaent</label>
                                    <input disabled class="admin-input" id="adminLocation" type="text"
                                        placeholder="Enter location" value="{{ $user->user_city }}">
                                </div>
                            </div>
                            <div class="admin-form-group">
                                <label class="admin-label" for="adminEmail">Email</label>
                                <input disabled class="admin-input" id="adminEmail" type="email"
                                    placeholder="Enter your email" value="{{ $user->email }}">
                            </div>
                            <div class="admin-row">
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminPhone">Phone</label>
                                    <input disabled class="admin-input" id="adminPhone" type="tel"
                                        placeholder="Enter your phone number" value="{{ $user->mobile_number }}">
                                </div>
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminBirthday">Birthday</label>
                                    <input disabled class="admin-input" id="adminBirthday" type="date"
                                        value="{{ $user->birth_date }}">
                                </div>
                            </div>
                            <div class="admin-row">
                                <div class="admin-col-6">
                                    <label class="admin-label" for="Created_at">Created at :</label>
                                    <input disabled class="admin-input" id="Created_at" type="date"
                                        placeholder="Created_at" value="{{ $user->created_at->toDateString() }}">
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="button-container">
                        <a href="{{ route('admin.profile.edit') }}" class="admin-btn admin-btn-primary">
                            Edit Profile
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection