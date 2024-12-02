@extends('admin.source.template')
@section('content')
<h1>Jobs Dashboard</h1>
<h2>Add Job</h2>
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
<form id="addJobForm" action="{{ route('admin.jobs.storeJob') }}" method="POST" enctype="multipart/form-data">
    @csrf
    

    <!-- User ID Dropdown -->
    <div>
        <label for="userId">User ID</label>
        <select id="userId" name="user_id" required>
            <option value="" disabled selected>Select User</option>
            @foreach(\App\Models\User::all() as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} (ID: {{ $user->id }})
                </option>
            @endforeach
        </select>
        @error('user_id')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="job_title" value="{{ old('job_title') }}" required>
        @error('job_title')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea id="description" name="job_description">{{ old('job_description') }}</textarea>
        @error('job_description')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <!-- Governate Dropdown -->
    <div>
        <label for="governate">Governate</label>
        <select id="governate" name="job_governate" required>
            <option value="" disabled selected>Select Governate</option>
            @foreach(\App\Models\Governate::all() as $governate)
                <option value="{{ $governate->governate_name }}" {{ old('job_governate') == $governate->governate_name ? 'selected' : '' }}>
                    {{ $governate->governate_name }}
                </option>
            @endforeach
        </select>
        @error('job_governate')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="city">City</label>
        <select id="city" name="job_city" required>
            <option value="" disabled selected>Select City</option>
        </select>
    </div>

    <div>
        <label for="detailedLocation">Detailed Location</label>
        <input type="text" id="detailedLocation" name="job_detailed_location" value="{{ old('job_detailed_location') }}">
        @error('job_detailed_location')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="jobType">Job Type</label>
        <select id="jobType" name="job_type" required>
            <option value="" disabled selected>Select Job Type</option>
            <option value="day" {{ old('job_type') == 'day' ? 'selected' : '' }}>Day</option>
            <option value="month" {{ old('job_type') == 'month' ? 'selected' : '' }}>Month</option>
            <option value="project" {{ old('job_type') == 'project' ? 'selected' : '' }}>Project</option>
        </select>
        @error('job_type')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="paymentAmount">Payment Amount</label>
        <input type="number" id="paymentAmount" name="payment_amount" value="{{ old('payment_amount') }}" step="0.01" required>
        @error('payment_amount')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="jobDuration">Job Duration (Days)</label>
        <input type="number" id="jobDuration" name="job_duration" value="{{ old('job_duration') }}">
        @error('job_duration')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="isUrgent">Is Urgent?</label>
        <select id="isUrgent" name="is_urgent" required>
            <option value="" disabled selected>Select Urgency</option>
            <option value="1" {{ old('is_urgent') == '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('is_urgent') == '0' ? 'selected' : '' }}>No</option>
        </select>
        @error('is_urgent')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    
    <div>
        <label for="job_visibility">job visibility</label>
        <select id="job_visibility" name="job_visibility" required>
            <option value="" disabled selected>Select Urgency</option>
            <option value="public" {{ old('job_visibility') == 'public' ? 'selected' : '' }}>Yes</option>
            <option value="private" {{ old('job_visibility') == 'private' ? 'selected' : '' }}>No</option>
        </select>
        @error('is_urgent')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="postDeadline">Post Deadline</label>
        <input type="date" id="postDeadline" name="post_deadline" value="{{ old('post_deadline') }}">
        @error('post_deadline')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="startDate">Start Date</label>
        <input type="date" id="startDate" name="start_date" value="{{ old('start_date') }}">
        @error('start_date')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <!-- Category Dropdown -->
    <div>
        <label for="category">Category</label>
        <select id="category" name="job_category" required>
            <option value="" disabled selected>Select Category</option>
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{ $category->category_id }}" {{ old('job_category') == $category->category_id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        @error('job_category')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="priorityLevel">Priority Level</label>
        <input type="number" id="priorityLevel" name="priority_level" value="{{ old('priority_level') }}" min="0">
        @error('priority_level')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="isCustomCategory">Is Custom Category?</label>
        <select id="isCustomCategory" name="is_custom_category" required>
            <option value="0" {{ old('is_custom_category') == '0' ? 'selected' : '' }}>No</option>
            <option value="1" {{ old('is_custom_category') == '1' ? 'selected' : '' }}>Yes</option>
        </select>
        @error('is_custom_category')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div id="customCategoryDiv" style="display:none;">
        <label for="customCategory">Custom Category</label>
        <input type="text" id="customCategory" name="custom_category" value="{{ old('custom_category') }}">
        @error('custom_category')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="numberOfWorkers">Number of Workers</label>
        <input type="number" id="numberOfWorkers" name="number_of_workers" value="{{ old('number_of_workers') }}" min="1">
        @error('number_of_workers')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="max_applicants">max applicants</label>
        <input type="number" id="max_applicants" name="max_applicants" value="{{ old('max_applicants') }}" min="1">
        @error('max_applicants')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="jobMedia">Job Media</label>
        <input type="file" id="jobMedia" name="job_media">
        @error('job_media')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="jobStatus">Job Status</label>
        <select id="jobStatus" name="job_status" required>
            <option value="" disabled selected>Select Status</option>
            <option value="open" {{ old('job_status') == 'open' ? 'selected' : '' }}>Open</option>
            <option value="closed" {{ old('job_status') == 'closed' ? 'selected' : '' }}>Closed</option>
            <option value="completed" {{ old('job_status') == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="cancelled" {{ old('job_status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
        @error('job_status')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="paymentStatus">Payment Status</label>
        <select id="paymentStatus" name="payment_status" required>
            <option value="" disabled selected>Select Payment Status</option>
            <option value="pending" {{ old('payment_status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ old('payment_status') == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="refunded" {{ old('payment_status') == 'refunded' ? 'selected' : '' }}>Refunded</option>
        </select>
        @error('payment_status')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Add Job</button>
</form>

<script>
    // Add event listener for governate change
    document.getElementById('governate').addEventListener('change', function() {
        var governateId = this.value;
        console.log(governateId);  // Log the selected governateId

        if (governateId) {
            // Make AJAX request to fetch cities based on the selected governate
            fetch(`/admin/jobs/cities/${governateId}`)
                .then(response => response.json())
                .then(cities => {
                    var citySelect = document.getElementById('city');
                    citySelect.innerHTML = '<option value="" disabled selected>Select City</option>'; // Reset cities
                    cities.forEach(city => {
                        var option = document.createElement('option');
                        option.value = city;
                        option.textContent = city;
                        citySelect.appendChild(option);
                    });
                });
        } else {
            // Reset the city dropdown if no governate is selected
            document.getElementById('city').innerHTML = '<option value="" disabled selected>Select City</option>';
        }
    });
</script>

@endsection
