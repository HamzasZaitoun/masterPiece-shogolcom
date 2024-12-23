@extends('admin.source.template')
@section('content')
    <h1>{NAME} profile</h1>
    <div class="admin-container">
        <div class="admin-row">
            <div class="admin-col-4">
                <!-- Profile picture card -->
                <div class="admin-card admin-profile-card">
                    <div class="admin-card-body admin-text-center">
                        <!-- Profile picture image -->
                        <img class="admin-profile-img admin-rounded-circle"
                            src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Admin Profile Picture">
                        <!-- Profile picture bio -->
                        <div class="admin-bio">
                            <h3>John Doe</h3><br>
                            <h3>About :</h3>
                            <p>Administrator at TechCorp lorem lorem lorem lorem </p>
                        </div>
                        <button class="admin-btn admin-btn-primary" type="button">Upload New Image</button>
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
                                    <input  class="admin-input" id="adminFirstName" type="text"
                                        placeholder="Enter your first name" value="John">
                                </div>
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminLastName">Last Name</label>
                                    <input  class="admin-input" id="adminLastName" type="text"
                                        placeholder="Enter your last name" value="Doe">
                                </div>
                            </div>
                            <div class="admin-row">
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminOrgName">city</label>
                                    <input  class="admin-input" id="adminOrgName" type="text"
                                        placeholder="Enter organization" value="Amman">
                                </div>
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminLocation">Govermaent</label>
                                    <input  class="admin-input" id="adminLocation" type="text"
                                        placeholder="Enter location" value="ALnasser">
                                </div>
                            </div>
                            <div class="admin-form-group">
                                <label class="admin-label" for="adminEmail">Email</label>
                                <input  class="admin-input" id="adminEmail" type="email"
                                    placeholder="Enter your email" value="admin@techcorp.com">
                            </div>
                            <div class="admin-row">
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminPhone">Phone</label>
                                    <input  class="admin-input" id="adminPhone" type="tel"
                                        placeholder="Enter your phone number" value="123-456-7890">
                                </div>
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminBirthday">Birthday</label>
                                    <input  class="admin-input" id="adminBirthday" type="date"
                                        value="1990-01-01">
                                </div>
                            </div>
                            <button class="admin-btn admin-btn-primary" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
