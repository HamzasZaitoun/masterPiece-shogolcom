<section class="job-section recent-jobs-section section-padding">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 col-12 mb-4">
                <h2>Recent Jobs</h2>

                <p><strong>Over 10k opening jobs</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito adipcingi elit eismuod larehai</p>
            </div>

            <div class="clearfix"></div>
            @foreach($recentJobs as $recentJob)
            <div class="col-lg-4 col-md-6 col-12 job-card">
                <div class="job-thumb job-thumb-box">
                    <div class="job-image-box-wrap">
                        <a href="job-details.php">
                            <img src="{{ $recentJob->job_media ? asset('uploads/jobs/'.$recentJob->job_media) : asset('assets/user/images/defaults/defaultJob.jpg') }}" class="job-image img-fluid"  alt="">
                        </a>

                        <div class="job-image-box-wrap-info d-flex align-items-center">
                            <p class="mb-0">
                                <a href="job-listings.php" class="badge badge-level">{{$recentJob->job_type}}</a>
                            </p>

                            <p class="mb-0">
                                <a href="job-listings.php" class="badge">Freelance</a>
                            </p>
                        </div>
                    </div>

                    <div class="job-body">
                        <h4 class="job-title">
                            <a href="job-details.php" class="job-title-link">{{ \Illuminate\Support\Str::limit($recentJob->job_title, 15, '...') }}</a>
                        </h4>

                        <div class="d-flex align-items-center">
                            <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                <img src="{{asset('assets/user/images/logos/salesforce.png')}}" class="job-image me-3 img-fluid" alt="">

                                <p class="mb-0">{{$recentJob->user->first_name .' ' . $recentJob->user->last_name}}</p>
                            </div>

                            <a href="#" class="bi-bookmark ms-auto me-2">
                            </a>

                            <a href="#" class="bi-heart">
                            </a>
                        </div>

                        <div class="d-flex align-items-center">
                            <span class="job-location">
                                <i class="custom-icon bi-geo-alt me-1"></i>
                                {{$recentJob->job_governorate . ' '. $recentJob->job_city}}
                            </span>

                            <span class="job-date">
                                <i class="custom-icon bi-clock me-1"></i>
                                {{ $recentJob->created_at->diffForHumans()}}
                            </span>
                        </div>

                        <div class="d-flex align-items-center border-top pt-3">
                            <p class="job-price mb-0">
                                <i class="custom-icon bi-cash me-1"></i>
                                {{ $recentJob->payment_amount}}
                            </p>

                            <a href="job-details.php" class="custom-btn btn ms-auto">Apply now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           

            

            <div class="col-lg-4 col-12 recent-jobs-bottom d-flex ms-auto my-4">
                <a href="{{route('jobs')}}" class="custom-btn btn ms-lg-auto">Browse Job Listings</a>
            </div>

        </div>
    </div>
</section>