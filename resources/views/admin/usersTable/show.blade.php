@extends('admin.source.template')
@section('content')
<h1>Users dashboard</h1>
 <div>
    <h2>User details</h2>
   <form id="userForm" action="{{Route('admin.users.editUser')}}" method="POST">
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" id="id" value="12345" disabled>
    </div>
    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" value="John" disabled>
    </div>
    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" value="Doe" disabled>
    </div>
    <div class="form-group">
        <label for="mobileNumber">Mobile Number</label>
        <input type="text" name="mobileNumber" id="mobileNumber" value="123-456-7890" disabled>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="password123" disabled>
    </div>
    <div class="form-group">
        <label for="profileImage">Profile Image</label>
        <input type="file" name="profile" id="profileImage" disabled>
    </div>
    <div class="form-group">
        <label for="level">Level</label>
        <input type="number" name="level" id="level" value="3" disabled>
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <input type="text" id="city" value="New York" disabled>
    </div>
    <div class="form-group">
        <label for="bio">Bio</label>
        <input type="text" id="bio" value="Web Developer" disabled>
    </div>
    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" id="rating" value="4.5" disabled>
    </div>
    <div class="form-group">
        <label for="ratingCount">Rating Count</label>
        <input type="number" id="ratingCount" value="50" disabled>
    </div>
    <div class="form-group">
        <label for="verificationStatus">Verification Status</label>
        <input type="text" id="verificationStatus" value="Verified" disabled>
    </div>
    <div class="form-group">
        <label for="accountStatus">Account Status</label>
        <input type="text" id="accountStatus" value="Active" disabled>
    </div>
    <div class="form-group">
        <label for="signUpDate">SignUp Date</label>
        <input type="date" id="signUpDate" value="2023-01-01" disabled>
    </div>
    <div class="form-group">
        <label for="updatedDate">Updated Date</label>
        <input type="date" id="updatedDate" value="2024-01-01" disabled>
    </div>
    <div class="form-group">
        <label for="lastLogin">Last Login</label>
        <input type="date" id="lastLogin" value="2024-11-01" disabled>
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <input type="text" id="role" value="admin" disabled>
    </div>
    <div class="form-group">
        <label for="preferences">Preferences</label>
        <input type="text" id="preferences" value="Dark Mode" disabled>
    </div>
    <div class="form-group">
        <label for="isVerifiedWorker">Is Verified Worker</label>
        <input type="text" id="isVerifiedWorker" value="Yes" disabled>
    </div>
    <div class="form-group">
        <label for="deviceToken">Device Token</label>
        <input type="text" id="deviceToken" value="abc123xyz" disabled>
    </div>
    <div class="form-group">
        <label for="deletedDate">Deleted Date</label>
        <input type="date" id="deletedDate" value="" disabled>
    </div>

    <div class="button-container text-center">
        <button class="delete-btn"><i class="bi bi-trash3"></i></button>
        <button type="button" onclick="toggleEdit()" id="editButton">Edit user</button>
        <button type="submit" onclick="sweetSaveChanges()" id="saveButton" style="display: none;">Save Changes</button>
    </div>
</form>
 </div>
 <hr>
 <section class="user-applications">
    <p>{User application}</p>
    <div class="content-section">
    <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="{{asset('assets/images/logos/google.png')}}" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.php" class="job-title-link">Technical Lead</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                Kuala, Malaysia
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                10 hours ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $20k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge badge-level">Internship</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge">Freelance</a>
                                                </p>
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge pending">Pending</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="assets/images/logos/apple.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.php" class="job-title-link">Business Director</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                California, USA
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                1 day ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $90k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge badge-level">Senior</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge">Full Time</a>
                                                </p>
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge pending">Pending</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!--3  -->
                             <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="../images/logos/slack.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.php" class="job-title-link">Dev Ops</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                Bangkok, Thailand
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                40 minutes ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $75k - 80k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge badge-level">Senior</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge">Part Time</a>
                                                </p>
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge pending">Pending</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 4 -->
                            <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="{{asset('assets/images/logos/creative-market.png')}}" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.php" class="job-title-link">UX Designer</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                Bangkok, Thailand
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                2 hours ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $100k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge badge-level">Entry</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge">Remote</a>
                                                </p>
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge pending">Pending</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
 </section>
</main>
@endsection

