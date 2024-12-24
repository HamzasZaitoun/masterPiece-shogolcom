<section class="job-section job-featured-section section-padding" id="job-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12 text-center mx-auto mb-4 ">
                <h2>urgent Jobs</h2>

                <p><strong>Jobs that need to be done now!</strong></p>
            </div>

            <div class="col-lg-12 col-12">

                @foreach ($urgentJobs as $urgentJob)
                    <div class="job-thumb d-flex">
                        <div class="job-image-wrap bg-white shadow-lg">
                            <img src="{{ $urgentJob->job_media ? asset('uploads/jobs/' . $urgentJob->job_media) : asset('assets/user/images/defaults/defaultJob.jpg') }}"
                                class="urgent-job-image img-fluid" alt="">

                        </div>

                        <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                            <div class="mb-3">
                                <h4 class="job-title mb-lg-0">
                                    <a href="{{ route('JobDetails', $urgentJob->job_id) }}"
                                        class="job-title-link">{{ \Illuminate\Support\Str::limit($urgentJob->job_title, 15, '...') }}</a>
                                </h4>

                                <div class="d-flex flex-wrap align-items-center">
                                    <p class="job-location mb-0">
                                        <i class="custom-icon bi-geo-alt me-1"></i>
                                        {{ $urgentJob->job_governorate . ', ' . $urgentJob->job_city }}
                                    </p>

                                    <p class="job-date mb-0">
                                        <i class="custom-icon bi-clock me-1"></i>
                                        {{ $urgentJob->created_at->diffForHumans() }}
                                    </p>

                                    <p class="job-price mb-0">
                                        <i class="custom-icon bi-cash me-1"></i>
                                        {{ $urgentJob->payment_amount }}
                                    </p>

                                    <div class="d-flex">
                                        <p class="mb-0">
                                            <a href="job-listings.php"
                                                class="badge badge-level">{{ $urgentJob->job_type }}</a>
                                        </p>

                                        <p class="mb-0">
                                            <a href="job-listings.php"
                                                class="badge">{{ $urgentJob->category->category_name }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="job-section-btn-wrap">
                                @if (!auth()->check() || (auth()->check() && auth()->user()->id != $urgentJob->user_id))
                                    <a href="{{ route('JobDetails', $urgentJob->job_id) }}" class="custom-btn2 btn">Apply
                                        now</a>
                                        
                                            
                                        @else
                                        <a href="{{ route('JobDetails', $urgentJob->job_id) }}" class="custom-btn btn">edit job</a>
                                      
                                @endif


                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

        </div>
    </div>
</section>
