@extends('admin.source.template')

@section('content')
    <h1>{{ $user->first_name }}'s Profile</h1>
    <div class="admin-container">
        <div class="admin-row">
            <div class="admin-col-4">
                <div class="admin-card admin-profile-card">
                    <div class="admin-card-body admin-text-center">
                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <img class="admin-profile-img admin-rounded-circle"
                                src="{{ asset('uploads/users/' . $user->profile_picture) }}" alt="Admin Profile Picture">
                            <div class="admin-bio">
                                <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                                <h3>About :</h3>
                                <div class="admin-col-6">
                                    <label class="admin-label" for="bio">bio</label>
                                    <input class="admin-input" id="bio" type="text" name="bio"
                                        value="{{ $user->bio }}">
                                </div>
                            </div>

                            <input type="file" name="profile_picture" class="admin-input" accept="image/*">
                            <button class="admin-btn admin-btn-primary" type="submit" style="margin-top:8px;">Save
                                Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="admin-col-8">
                <div class="admin-card">
                    <div class="admin-card-header">Account Details</div>
                    <div class="admin-card-body">
                        <form action="{{ route('admin.profile.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="admin-row">
                                <div class="admin-col-6">
                                    <label class="admin-label" for="first_name">First Name</label>
                                    <input class="admin-input" id="first_name" type="text" name="first_name"
                                        value="{{ $user->first_name }}">
                                </div>
                                <div class="admin-col-6">
                                    <label class="admin-label" for="last_name">Last Name</label>
                                    <input class="admin-input" id="last_name" type="text" name="last_name"
                                        value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="admin-row">
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminOrgName">city</label>
                                    <select class="admin-input" id="user_governorate" name="user_governorate" required>
                                        <option value="" disabled selected>Select governorate</option>
                                        @foreach (\App\Models\Governorate::all() as $governorate)
                                            <option value="{{ $governorate->governorate_name }}"
                                                {{ old('user_governorate') == $governorate->governorate_name ? 'selected' : '' }}>
                                                {{ $governorate->governorate_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_governorate')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="admin-col-6">
                                    <label class="admin-label" for="adminLocation">Govermaent</label>
                                    <select class="admin-input" id="user_city" name="user_city" required>
                                        <option value="" disabled selected>Select City</option>
                                    </select>
                                    @error('user_city')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="admin-form-group">
                                <label class="admin-label" for="email">Email</label>
                                <input class="admin-input" id="email" type="email" name="email"
                                    value="{{ $user->email }}">
                            </div>

                            <div class="admin-row">
                                <div class="admin-col-6">
                                    <label class="admin-label" for="mobile_number">Phone</label>
                                    <input class="admin-input" id="mobile_number" type="tel" name="mobile_number"
                                        value="{{ $user->mobile_number }}">
                                </div>
                                <div class="admin-col-6">
                                    <label class="admin-label" for="birth_date">Birthday</label>
                                    <input class="admin-input" id="birth_date" type="date" name="birth_date"
                                        value="{{ $user->birth_date }}">
                                </div>
                            </div>

                            <button class="admin-btn admin-btn-primary" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Add event listener for governorate change
        document.getElementById('user_governorate').addEventListener('change', function() {
            var governorateId = this.value;
            console.log(governorateId); // Log the selected governorateId

            if (governorateId) {
                fetch(`/admin/users/cities/${governorateId}`)
                    .then(response => response.json())
                    .then(cities => {
                        var citySelect = document.getElementById('user_city');
                        citySelect.innerHTML =
                            '<option value="" disabled selected>Select City</option>'; // Reset cities
                        cities.forEach(city => {
                            var option = document.createElement('option');
                            option.value = city;
                            option.textContent = city;
                            citySelect.appendChild(option);
                        });
                    });
            } else {
                document.getElementById('user_city').innerHTML =
                    '<option value="" disabled selected>Select City</option>';
            }
        });
    </script>
@endsection