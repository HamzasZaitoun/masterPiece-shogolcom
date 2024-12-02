@extends('admin.source.template')
@section('content')
    <h1>Users Dashboard</h1>
    <h2>Add User</h2>
    <form id="addUserForm" action="{{ route('admin.users.storeUser') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">First Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
            @error('last_name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="gender">Gender</label>
            <select id="gender" name="gender" value="{{ old('gender') }}" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            @error('gender')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="mobile_number">Mobile Number</label>
            <input type="text" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" required>
            @error('mobile_number')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="profilePicture">Profile Picture</label>
            <input type="file" id="profilePicture" name="profilePicture" value="{{ old('profilePicture') }}">
            @error('profilePicture')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="balance">Balance</label>
            <input type="number" id="balance" name="balance" min="0" value="{{ old('balance') }}">
            @error('balance')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Governate -->
        <div>
            <label for="user_governate">Governate</label>
            <select id="user_governate" name="user_governate" required>
                <option value="" disabled selected>Select Governate</option>
                @foreach(\App\Models\Governate::all() as $governate)
                    <option value="{{ $governate->governate_name }}" {{ old('user_governate') == $governate->governate_name ? 'selected' : '' }}>
                        {{ $governate->governate_name }}
                    </option>
                @endforeach
            </select>
            @error('user_governate')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- City -->
        <div>
            <label for="user_city">City</label>
            <select id="user_city" name="user_city" required>
                <option value="" disabled selected>Select City</option>
            </select>
            @error('user_city')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Detailed Location -->
        <div>
            <label for="user_detailed_location">Detailed Location</label>
            <input type="text" id="user_detailed_location" name="user_detailed_location" value="{{ old('user_detailed_location') }}" required>
            @error('user_detailed_location')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="bio">Bio</label>
            <input type="text" id="bio" name="bio" value="{{ old('bio') }}">
            @error('bio')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="role">Role</label>
            <select id="role" name="role" value="{{ old('role') }}" required>
                <option value="" disabled selected>Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            @error('role')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="accountStatus">Account Status</label>
            <select id="accountStatus" name="accountStatus" value="{{ old('accountStatus') }}" required>
                <option value="" disabled selected>Select Account Status</option>
                <option value="active">Active</option>
                <option value="suspended">Suspended</option>
                <option value="banned">Banned</option>
            </select>
            @error('accountStatus')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="button-container">
            <button type="submit">Add</button>
        </div>
    </form>

    <script>
        // Add event listener for governate change
        document.getElementById('user_governate').addEventListener('change', function() {
            var governateId = this.value;
            console.log(governateId);  // Log the selected governateId

            if (governateId) {
                fetch(`/admin/users/cities/${governateId}`)
                    .then(response => response.json())
                    .then(cities => {
                        var citySelect = document.getElementById('user_city');
                        citySelect.innerHTML = '<option value="" disabled selected>Select City</option>'; // Reset cities
                        cities.forEach(city => {
                            var option = document.createElement('option');
                            option.value = city;
                            option.textContent = city;
                            citySelect.appendChild(option);
                        });
                    });
            } else {
                document.getElementById('user_city').innerHTML = '<option value="" disabled selected>Select City</option>';
            }
        });
    </script>
@endsection
