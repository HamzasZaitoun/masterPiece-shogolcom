@extends('user.source.template')

@section('content')
<main>


    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" /> --}}

    <div class="container">
    <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>My Profile</h3>
                    <hr>
                </div>
                <form class="file-upload" method="POST" action="{{route('updateProfile')}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Profile Picture -->
                    <div class="col-xxl-4">
                        <div class="bg-secondary-soft px-4 py-5 rounded">
                            <div class="row g-3">
                                <h4 class="mb-4 mt-0">Update your profile photo</h4>
                                <div class="text-center">
                                    <!-- Image upload -->
                                    <div class="square position-relative display-2 mb-3">
                                        <!-- Profile Image -->
                                        <img id="profilePicturePreview" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;" 
                                             src="{{ $user->profile_picture ? asset('uploads/users/' . $user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}" 
                                             alt="profile image">
                                    </div>
                                    <!-- Button -->
                                    <input type="file" id="customFile" name="profile_picture" hidden="" onchange="previewImage(event)" accept="image/*">
                                    <label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
                                    {{-- <button type="button" class="btn btn-danger-soft" onclick="removeImage()">Remove</button> --}}
                                    <!-- Content -->
                                    <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span> Minimum size 300px x 300px</p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!-- Bio -->
                    <div class="col-md-12">
                        <label class="form-label">Bio</label>
                        <textarea name="bio" class="form-control" placeholder="" aria-label="Bio">{{ old('bio', $user->bio) }}</textarea>
                    </div>
                
                    <!-- Contact Details -->
                    <div class="row mb-5 gx-5">
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}">
                                    </div>
                
                                    <!-- Last Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}">
                                    </div>
                
                                    <!-- Phone Number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Phone number *</label>
                                        <input type="text" pattern="^07\d{8}$" title="Phone number must be 10 digits and start with 07" name="mobile_number" class="form-control" value="{{ old('mobile_number', $user->mobile_number) }}">
                                    </div>
                
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email *</label>
                                        <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ old('email', $user->email) }}">
                                    </div>
                
                                    <!-- Governorate -->
                                    <div class="col-md-6">
                                        <label class="form-label">Governorate</label>
                                        <select class="form-select" name="user_governorate" id="user_governorate">
                                            <option value="" disabled>Select Governorate</option>
                                            @foreach ($governorates as $governorate)
                                                <option value="{{ $governorate->governorate_name }}" {{ old('user_governorate', $user->user_governorate) == $governorate->governorate_name ? 'selected' : '' }}>
                                                    {{ $governorate->governorate_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                
                                    <!-- City -->
                                    <div class="col-md-6">
                                        <label class="form-label">City</label>
                                        <select name="user_city" id="user_city" class="form-control form-select" required>
                                            <option value="{{ $user->user_city }}" selected>{{ $user->user_city }}</option>
                                        </select>
                                    </div>
                
                                </div>
                            </div>
                        </div>
                        
                        <!-- Update Button -->
                        <button type="submit" class="custom-btn btn">Update profile</button>
                    </div>
                </form>
                
            </div>
        </div>
        </div>

</main>
<script>
    // Add event listener for Governorate change
    document.getElementById('user_governorate').addEventListener('change', function() {
        var GovernorateId = this.value;
        console.log(GovernorateId); 

        if (GovernorateId) {
            fetch(`/admin/users/cities/${GovernorateId}`)
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
            document.getElementById('job_city').innerHTML =
                '<option value="" disabled selected>Select City</option>';
        }
    });
</script>
<script>
    
    // Preview image function
function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    // Only proceed if a file is selected
    if (file) {
        reader.onload = function(e) {
            const preview = document.getElementById('profilePicturePreview');
            preview.src = e.target.result;
            preview.hidden = false; // Show the preview
        };
        reader.readAsDataURL(file); // Convert the file to a data URL
    }
}

// Remove image function
function removeImage() {
    const input = document.getElementById('customFile');
    const preview = document.getElementById('profilePicturePreview');

    input.value = ''; // Clear the file input
    preview.src = "{{ asset('assets/user/images/defaults/defaultPFP2.jpg') }}";
    
}

</script>
@endsection