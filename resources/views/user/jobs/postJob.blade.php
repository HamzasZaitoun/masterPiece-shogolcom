@extends('user.source.template')
@section('content')
    <main>

        <section class="new-post-section section-padding pb-0">
            <div class="container">
                <h2 class="new-post-title mb-0 text-center ">Post a new job</h2>
                <div class="row  bg-white">
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
                    <div class="col-lg-8 col-12 mx-auto">
                        <form class="custom-form contact-form" action="{{route('publishJob')}}" method="post" role="form"  enctype="multipart/form-data">
                            @csrf

                            <div class="row">


                                <div class="col-lg-4 col-md-4 col-12">
                                    <label for="job-title">Job Title</label>
                                    <input type="text" name="job_title" id="job-title" class="form-control"
                                        placeholder="Enter Job Title" maxlength="255" required value="{{old('job_title')}}">
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <label for="job_category">Job category</label>
                                    <select name="job_category" id="job_category" class="form-control form-select" required>
                                        <option value="" disabled selected>Select Job category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_id }}"
                                                {{ old('job_category') == $category->category_id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-12" id="customCategory" style="display:none;">
                                    <label for="custom_category"> Category</label>
                                    <input type="text" name="custom_category" id="custom_category" class="form-control"
                                        placeholder="Enter job Category" maxlength="255" value="{{old('custom_category')}}">
                                </div>
                                


                                <div class="col-lg-4 col-md-4 col-12"id="jobType">
                                    <label for="job_type">Job Type</label>
                                    <select name="job_type" id="job_type" class="form-control form-select" required>
                                        <option value="" disabled selected>Select Job Type</option>
                                        <option value="day" {{ old('job_type') == 'day' ? 'selected' : '' }}>Daily</option>
                                        <option value="month" {{ old('job_type') == 'month' ? 'selected' : '' }}>Monthely</option>
                                        <option value="project" {{ old('job_type') == 'project' ? 'selected' : '' }}>per Project</option>
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-4 col-12">
                                    <label for="job_description">Job description</label>
                                    <textarea type="text" name="job_description" id="job_description" class="form-control" placeholder="Enter job description" maxlength="255"
                                        required>
                                        {{ old('job_description') }}
                                    </textarea>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <label for="job_governorate">Job governorate</label>
                                    <select name="job_governorate" id="job_governorate" class="form-control form-select" required>
                                        <option value="" disabled selected>Select Job governorate</option>
                                        @foreach ($governorates as $governorate)
                                        <option value="{{ $governorate->governorate_name }}"
                                            {{ old('job_governorate') == $governorate->governorate_name ? 'selected' : '' }}>
                                            {{ $governorate->governorate_name }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <label for="job_city">Job City</label>
                                    <select name="job_city" id="job_city" class="form-control form-select" required>
                                        <option value="" disabled selected>Select job city</option>
                                        
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <label for="job_detailed_location">Job detailed location:</label>
                                    <input type="text" name="job_detailed_location" id="job_detailed_location" class="form-control"
                                        placeholder="Enter City" maxlength="255" value="{{ old('job_detailed_location') }}">
                                </div>



                                <div class="col-lg-4 col-md-4 col-12">
                                    <label for="payment_amount">Payment Amount</label>
                                    <input type="number" name="payment_amount" id="payment_amount" class="form-control"
                                        placeholder="Enter Payment Amount" min="0" required value="{{ old('payment_amoun') }}">
                                </div>

                                {{-- <div class="col-lg-4 col-md-4 col-12">
                                <label for="job-duration">Job Duration (days)</label>
                                <input type="number" name="job_duration" id="job-duration" class="form-control" placeholder="Enter Duration" min="1" optional>
                            </div>
                         --}}






                                <div class="col-lg-4 col-md-4 col-12">
                                    <label for="number_of_workers">Number of Workers</label>
                                    <input type="number" name="number_of_workers" id="number_of_workers"
                                        class="form-control" placeholder="Enter Number of Workers" min="1" value="{{ old('number_of_workers') }}">
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" required
                                    value="{{ old('start_date') }}">
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <label for="job_duration">Job duration(in days)</label>
                                    <input type="number" name="job_duration" id="job_duration"
                                        class="form-control" placeholder="enter job duration in days" min="1" value="{{ old('job_duration') }}">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="is_urgent">Mark as Urgent job</label>
                                <div>
                                    <input type="checkbox" name="is_urgent" id="is_urgent" value="1"
                                        {{ old('is_urgent') ? 'checked' : '' }}>
                                    <label for="is_urgent">Urgent Job</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 mx-auto">
                                <label for="job-media">Job Media (optional)</label>
                                <input type="file" name="job_media" id="job-media" class="form-control"
                                    accept=".jpg,.jpeg,.png,.pdf">
                            </div>
                            <div class="col-lg-4 col-md-4 col-6 mx-auto ">
                                <button type="submit" class="form-control mx-auto">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script>
        // Add event listener for Governorate change
        document.getElementById('job_governorate').addEventListener('change', function() {
            var GovernorateId = this.value;
            console.log(GovernorateId); 

            if (GovernorateId) {
                fetch(`cities/${GovernorateId}`)
                    .then(response => response.json())
                    .then(cities => {
                        var citySelect = document.getElementById('job_city');
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
 $(document).ready(function(){
        $('#job_category').change(function(){
            if ($(this).val() == '6') {
                $('#customCategory').show();
                $('#jobType').attr('class', 'col-lg-12');

            } else {
                $('#customCategory').hide();
                $('#jobType').attr('class', 'col-lg-4');
            }
        });
    });
    </script>
@endsection
