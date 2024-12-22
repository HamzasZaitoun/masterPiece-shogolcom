@extends('admin.source.template')
@section('content')
    <h1>Users Dashboard</h1>
    <h2>Add User</h2>
    <form class="form" id="addUserForm" action="{{ route('admin.users.storeUser') }}" method="POST"
        enctype="multipart/form-data">
        @csrf

        <div class="input-field">
            <input class="input" placeholder="First Name" type="text" id="name" name="name"
                value="{{ old('name') }}" required>
            {{-- <label for="name"></label> --}}
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input class="input" placeholder="Last Name"class="input" placeholder=""class="input" placeholder="Last Name"
                type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
            {{-- <label for="last_name">Last Name</label> --}}
            @error('last_name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="select-container">
            {{-- <label for="gender">Gender</label> --}}
            <select class="select" id="gender" name="gender" value="{{ old('gender') }}" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            @error('gender')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input class="input" placeholder="Mobile Number"class="input" placeholder=""class="input" placeholder=""
                type="text" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" required>
            {{-- <label for="mobile_number">Mobile Number</label> --}}
            @error('mobile_number')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input class="input" placeholder="Email"class="input" placeholder=""type="text" id="email" name="email"
                value="{{ old('email') }}" required autocomplete="off">
            {{-- <label for="email">Email</label> --}}
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="select-container">
            {{-- <label for="role">Role</label> --}}
            <select class="select" id="role" name="role" value="{{ old('role') }}" required>
                <option value="" disabled selected>Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            @error('role')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input class="input" placeholder="Profile Picture"class="input" type="file" id="profilePicture"
                name="profilePicture" value="{{ old('profilePicture') }}">
            {{-- <label for="profilePicture">Profile Picture</label> --}}
            @error('profilePicture')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input class="input" placeholder="Balance"class="input" placeholder=""type="number" id="balance"
                name="balance" min="0" value="{{ old('balance') }}">
            {{-- <label for="balance">Balance</label> --}}
            @error('balance')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Governate -->
        <div class="select-container">
            {{-- <label for="user_governate">Governate</label> --}}
            <select class="select" id="user_governate" name="user_governate" required>
                <option value="" disabled selected>Select Governate</option>
                @foreach (\App\Models\Governorate::all() as $governorate)
                    <option value="{{ $governorate->governorate_name }}"
                        {{ old('user_governate') == $governorate->governorate_name ? 'selected' : '' }}>
                        {{ $governorate->governorate_name }}
                    </option>
                @endforeach
            </select>
            @error('user_governate')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input class="input" placeholder="Bio"class="input" placeholder=""type="text" id="bio" name="bio"
                value="{{ old('bio') }}">
            {{-- <label for="bio">Bio</label> --}}
            @error('bio')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Detailed Location -->
        <div class="input-field">
            <input class="input" placeholder="Detailed Location"class="input" placeholder=""type="text"
                id="user_detailed_location" name="user_detailed_location" value="{{ old('user_detailed_location') }}"
                required>
            {{-- <label for="user_detailed_location">Detailed Location</label> --}}
            @error('user_detailed_location')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- City -->
        <div class="select-container">
            {{-- <label for="user_city">City</label> --}}
            <select class="select" id="user_city" name="user_city" required>
                <option value="" disabled selected>Select City</option>
            </select>
            @error('user_city')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input class="input" placeholder="Password"class="input" placeholder=""type="password" id="password"
                name="password" required>
            {{-- <label for="password">Password</label> --}}
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="select-container">
            {{-- <label for="accountStatus">Account Status</label> --}}
            <select class="select" id="accountStatus" name="accountStatus" value="{{ old('accountStatus') }}" required>
                <option value="" disabled selected>Select Account Status</option>
                <option value="active">Active</option>
                <option value="suspended">Suspended</option>
                <option value="banned">Banned</option>
            </select>
            @error('accountStatus')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div></div>
        <div></div>
        <div class="button-container">
            <button class="create-btn" type="submit">Add User</button>
        </div>
    </form>

    <script>
        // Add event listener for governorate change
        document.getElementById('user_governate').addEventListener('change', function() {
            var governateId = this.value;
            console.log(governateId); // Log the selected governateId

            if (governateId) {
                fetch(`/admin/users/cities/${governateId}`)
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
