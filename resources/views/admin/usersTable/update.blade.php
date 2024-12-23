@extends('admin.source.template')

@section('content')
    <div class="form-container">
        <h1>User Dashboard</h1>
        <h2>Edit User</h2>
        @if ($errors->all())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form" action="{{ route('admin.users.updateUser', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                {{-- <label for="name">First Name</label> --}}
                <input class="input" placeholder="First Name"type="text" name="name" value="{{ $user->name }}" required>
            </div>
            <div>
                {{-- <label for="last_name">Last Name</label> --}}
                <input class="input" placeholder="Last Name"type="text" name="last_name" value="{{ $user->last_name }}" required>
            </div>
            <div>
                {{-- <label for="email">Email</label> --}}
                <input class="input" placeholder="Email"type="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div>
                {{-- <label for="mobile_number">Mobile Number</label> --}}
                <input class="input" placeholder="Mobile Number"type="text" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" required>
                @error('mobile_number')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div>
                {{-- <label for="password">Password</label> --}}
                <input class="input" placeholder="Password"type="password" id="password" name="password" required>
                @error('password')
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
            <div>
                {{-- <label for="profilePicture">Profile Picture</label> --}}
                <input class="input" placeholder="Profile Picture"type="file" id="profilePicture" name="profilePicture" value="{{ old('profilePicture') }}">
                @error('profilePicture')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="select-container">
                {{-- <label for="account_status">Account Status</label> --}}
                <select class="select" name="accountStatus">
                    <option value="active" {{ $user->account_status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $user->account_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="select-container">
                {{-- <label for="user_governate">Governate</label> --}}
                <select class="select" id="user_governate" name="user_governate" required>
                    <option value="" disabled selected>Select Governate</option>
                    @foreach (\App\Models\Governate::all() as $governate)
                        <option value="{{ $governate->governate_name }}"
                            {{ old('user_governate') == $governate->governate_name ? 'selected' : '' }}>
                            {{ $governate->governate_name }}
                        </option>
                    @endforeach
                </select>
                @error('user_governate')
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
            <div>
                {{-- <label for="user_detailed_location">Detailed Location</label> --}}
                <input class="input" placeholder="{{ old('user_detailed_location') }}"type="text" id="user_detailed_location" name="user_detailed_location"
                    value="{{ old('user_detailed_location') }}" required>
                @error('user_detailed_location')
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
            <div></div>
            <button class="edit-save-btn" type="submit">Update</button>
        </form>
    </div>
@endsection
