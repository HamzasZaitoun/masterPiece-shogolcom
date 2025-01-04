<section class="job-section recent-jobs-section section-padding">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 col-12 mb-4">
                <h2>Most Recent Jobs</h2>

            </div>

            <div class="clearfix"></div>
            @foreach($recentJobs as $job)
            <div class="col-lg-4 col-md-6 col-12 job-card">
                <div class="job-thumb job-thumb-box">
                    <div class="job-image-box-wrap">
                        <a href="{{route('JobDetails',$job->job_id)}}">
                            <img src="{{ $job->job_media ? asset('uploads/jobs/'.$job->job_media) : asset('assets/user/images/defaults/defaultJob.jpg') }}" class="job-image img-fluid"  alt="">
                        </a>

                        <div class="job-image-box-wrap-info d-flex align-items-center">
                            <p class="mb-0">
                                <a href="{{route('filterJobs',['job_type' => $job->job_type,])}}" class="badge badge-level">{{$job->job_type}}</a>
                            </p>

                            <p class="mb-0">
                                <a href="{{route('jobsByCategory',$job->job_category)}}" class="badge">{{$job->category->category_name}}</a>
                            </p>
                        </div>
                    </div>

                    <div class="job-body">
                        <h4 class="job-title">
                            <a href="job-details.php" class="job-title-link">{{ \Illuminate\Support\Str::limit($job->job_title, 15, '...') }}</a>
                        </h4>

                        <div class="d-flex align-items-center">
                            <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                <img src="{{ $job->user->profile_picture ? asset('uploads/users/' . $job->user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}" class="job-image2 " alt="">

                                <p class="mb-0">{{$job->user->first_name .' ' . $job->user->last_name}}</p>
                            </div>

                            <a href="#" class="bi-bookmark ms-auto me-2">
                            </a>

                            <a href="#" class="bi-heart">
                            </a>
                        </div>

                        <div class="d-flex align-items-center">
                            <span class="job-location">
                                <i class="custom-icon bi-geo-alt me-1"></i>
                                {{$job->job_governorate . ' '. $job->job_city}}
                            </span>

                            <span class="job-date">
                                <i class="custom-icon bi-clock me-1"></i>
                                {{ $job->created_at->diffForHumans()}}
                            </span>
                        </div>

                        <div class="d-flex align-items-center border-top pt-3">
                            <p class="job-price mb-0">
                                <i class="custom-icon bi-cash me-1"></i>
                                {{ $job->payment_amount}}
                            </p>

                            
                            @if (!auth()->check() || (auth()->check() && auth()->user()->id != $job->user_id))
                            <a href="{{route('JobDetails',$job->job_id)}}" class="custom-btn2 btn ms-auto">Apply now</a>
                                
                                    
                                @else
                                <a href="{{ route('JobDetails', $job->job_id) }}" class="custom-btn btn ms-auto">edit job</a>
                              
                        @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           

            

            <div class="col-lg-4 col-12 recent-jobs-bottom d-flex ms-auto my-4">
                <a href="{{route('jobs')}}" class="custom-btn btn ms-lg-auto">Browse More Jobs</a>
            </div>

        </div>
    </div>
</section>