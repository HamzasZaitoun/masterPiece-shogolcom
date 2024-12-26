@extends('user.source.template')
@section('content')
    <main>

        <header class="site-header">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">Job Details</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Job Details</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>


        <section class="job-section section-padding pb-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12">
                        <h2 class="job-title mb-0">
                            {{ $job->job_title }}
                        </h2>

                        <div class="job-thumb job-thumb-detail">
                            <div class="d-flex flex-wrap align-items-center border-bottom pt-lg-3 pt-2 pb-3 mb-4">
                                <p class="job-location mb-0">
                                    <i class="custom-icon bi-geo-alt me-1"></i>
                                    {{ $job->job_governorate . ', ' . $job->job_city }}
                                </p>

                                <p class="job-date mb-0">
                                    <i class="custom-icon bi-clock me-1"></i>
                                    {{ $job->created_at->diffForHumans() }}
                                </p>

                                <p class="job-price mb-0">
                                    <i class="custom-icon bi-cash me-1"></i>
                                    {{ $job->payment_amount }}
                                </p>

                                <div class="d-flex">
                                    <p class="mb-0">
                                        <a href="job-listings.php" class="badge badge-level">{{ $job->job_type }}</a>
                                    </p>

                                    <p class="mb-0">
                                        <a href="job-listings.php" class="badge">
                                            {{ $job->category->category_name }}
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <h4 class="mt-4 mb-2">Job Description</h4>

                            <p>{{ $job->job_description }}</p>

                            <h5 class="mt-4 mb-3">Additional information</h5>

                            <p class="mb-1"><strong>Start date: </strong>{{ $job->start_date }}</p>

                            <p><strong>Number of workers needed: </strong>{{ $job->number_of_workers }}</p>

                            <p><strong>job duration: </strong>{{ $job->job_duration || 'N/A' }} days</p>


                            @if (!auth()->check() || (auth()->check() && auth()->user()->id != $job->user_id))
                                <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                                    @if ($hasApplied)
                                        <!-- If user has applied, show "Delete Application" button -->
                                        <a class="custom-btn btn mt-2 btn-danger"
                                            onclick="confirmAction('{{ route('deleteApplication', $job->job_id) }}', 'Do you really want to delete your application? This action cannot be undone!', 'Yes, delete it!', 'Cancel', 'warning')">
                                            Delete Application
                                        </a>
                                    @elseif(!auth()->check())
                                        <!-- If user has not applied, show "Apply Now" button -->
                                        <a href="{{ route('login') }}" class="custom-btn btn mt-2 btn-primary">
                                            login to apply
                                        </a>
                                    @else
                                        <a class="custom-btn btn mt-2 btn-primary"
                                            onclick="confirmAction('{{ route('applyToJob', $job->job_id) }}', 'did you read all the job information!', 'Yes, apply now!', 'keep reading', 'info')">
                                            Apply Now
                                        </a>
                                    @endif


                                    <a href="#" class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3">Save this
                                        job</a>

                                    <div class="job-detail-share d-flex align-items-center">
                                        <p class="mb-0 me-lg-4 me-3">Share:</p>

                                        <a href="#" class="bi-share"></a>
                                    </div>
                                </div>
                        </div>
                    </div>
                @else
                    <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                        <a href="#" class="custom-btn btn mt-2">edit job details</a>

                        <a href="{{route('archiveJob',$job->job_id)}}" class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3">archive job</a>

                        <div class="job-detail-share d-flex align-items-center">
                            <p class="mb-0 me-lg-4 me-3">Share:</p>

                            <a href="#" class="bi-share"></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- @if (!auth()->check() || $job->user->id != auth()->user()->id) --}}
            <div class="col-lg-4 col-12 mt-5 mt-lg-0">
                <div class="job-thumb job-thumb-detail-box bg-white shadow-lg">

                    <div class="job-image-box-wrap">
                        <a href="{{ route('JobDetails', $job->job_id) }}">
                            <img src="{{ $job->job_media ? asset('uploads/jobs/' . $job->job_media) : asset('assets/user/images/defaults/defaultJob.jpg') }}"
                                class="job-image img-fluid" alt="">
                        </a>


                    </div>

                </div>
                <div class="job-thumb job-thumb-detail-box bg-white shadow-lg">
                    <div class="d-flex align-items-center">
                        <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mb-3">
                            <img src="{{ $job->user->profile_picture ? asset('uploads/users/' . $job->user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}"
                                class="urgent-job-image" alt="">
                        </div>

                        <a href="#" class="bi-bookmark ms-auto me-2"></a>

                        <a href="#" class="bi-heart"></a>
                    </div>

                    <h6 class="mt-3 mb-2">About 
                        @if(auth()->user()->id != $job->user->id)
                        <a href="{{ route('userProfile', $job->user->id) }}">
                        @else
                        <a href="{{ route('profile', $job->user->id) }}">
                        @endif
                            {{ $job->user->first_name }}</a></h6>

                    <p>{{ $job->user->bio }}</p>
                </div>
            </div>
            {{-- @endif        --}}

            </div>
            </div>
        </section>




        @if (!auth()->check() || (auth()->check() && auth()->user()->id != $job->user_id))
            {{-- similer jobs section --}}
            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-lg-4">
                            <h3>Similar Jobs</h3>

                            <p><strong>Over 10k opening jobs</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing
                                kengan omeg kohm tokito adipcingi elit eismuod larehai</p>
                        </div>

                        <div class="col-lg-4 col-12 d-flex ms-auto mb-5 mb-lg-4">
                            <a href="{{ route('jobs') }}" class="custom-btn custom-border-btn btn ms-lg-auto">Browse Job
                                Listings</a>
                        </div>

                        @foreach ($similerJobs as $job)
                            <div class="col-lg-4 col-md-6 col-12 job-card">
                                <div class="job-thumb job-thumb-box">
                                    <div class="job-image-box-wrap">
                                        <a href="{{ route('JobDetails', $job->job_id) }}">
                                            <img src="{{ $job->job_media ? asset('uploads/jobs/' . $job->job_media) : asset('assets/user/images/defaults/defaultJob.jpg') }}"
                                                class="job-image img-fluid" alt="">
                                        </a>

                                        <div class="job-image-box-wrap-info d-flex align-items-center">
                                            <p class="mb-0">
                                                <a href="job-listings.php"
                                                    class="badge badge-level">{{ $job->job_type }}</a>
                                            </p>

                                            <p class="mb-0">
                                                <a href="job-listings.php"
                                                    class="badge">{{ $job->category->category_name }}</a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-body">
                                        <h4 class="job-title">
                                            <a href="job-details.php"
                                                class="job-title-link">{{ \Illuminate\Support\Str::limit($job->job_title, 15, '...') }}</a>
                                        </h4>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                                <img src="{{ $job->user->profile_picture ? asset('uploads/users/' . $job->user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}"
                                                    class="job-image2 " alt="">

                                                <p class="mb-0">
                                                    {{ $job->user->first_name . ' ' . $job->user->last_name }}</p>
                                            </div>

                                            <a href="#" class="bi-bookmark ms-auto me-2">
                                            </a>

                                            <a href="#" class="bi-heart">
                                            </a>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <span class="job-location">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                {{ $job->job_governorate . ' ' . $job->job_city }}
                                            </span>

                                            <span class="job-date">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                {{ $job->created_at->diffForHumans() }}
                                            </span>
                                        </div>

                                        <div class="d-flex align-items-center border-top pt-3">
                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                {{ $job->payment_amount }}
                                            </p>


                                            @if (!auth()->check() || (auth()->check() && auth()->user()->id != $job->user_id))
                                                <a href="{{ route('JobDetails', $job->job_id) }}"
                                                    class="custom-btn2 btn ms-auto">Apply now</a>
                                            @else
                                                <a href="{{ route('JobDetails', $job->job_id) }}"
                                                    class="custom-btn btn ms-auto">edit job</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- end of similer jobs section --}}
        @else
            {{-- job applications section --}}
            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-lg-4">
                            <h3>Job Applications</h3>

                            <p><strong>Over 10k opening jobs</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing
                                kengan omeg kohm tokito adipcingi elit eismuod larehai</p>
                        </div>

                        <div class="col-lg-4 col-12 d-flex ms-auto mb-5 mb-lg-4">

                        </div>
                        @foreach ($jobApplications as $application)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="job-thumb job-thumb-box">
                                    <div class="job-image-box-wrap">
                                        <a href="{{route('userProfile',$application->user_id)}}">
                                            <img src="{{ $application->user->profile_picture ? asset('uploads/users/' . $application->user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}"
                                                class="job-image img-fluid" alt="go to profile">
                                        </a>


                                    </div>

                                    <div class="job-body">
                                        <h4 class="job-title">
                                            <a href="{{route('userProfile',$application->user_id)}}"
                                                class="job-title-link">{{ $application->user->first_name }}</a>
                                        </h4>



                                        <div class="d-flex align-items-center">
                                            <p class="job-location">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                {{ $application->user->user_governorate . ', ' . $application->user->user_city }}
                                            </p>

                                            <p class="job-date">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                {{ $application->applied_at }}
                                            </p>
                                        </div>
                                        <div class="container justify-center">
                                            <div class=" text-center border-top pt-3">
                                                <a href="job-details.php" class="custom-btn btn ms-auto">Accept</a>

                                                <a href="{{route('regectApplication',$application->application_id)}}" class="custom-btn btn ms-auto">Reject</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
            {{-- end of job applcations section --}}
        @endif


        <section class="cta-section">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-10">
                        <h2 class="text-white mb-2">Over 10k opening jobs</h2>

                        <p class="text-white">Gotto Job is a free HTML CSS template for job hunting related websites. This
                            layout is based on the famous Bootstrap 5 CSS framework. Thank you for visiting Tooplate
                            website.</p>
                    </div>

                    <div class="col-lg-4 col-12 ms-auto">
                        <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                            @guest
                                <a href="{{ route('login') }}" class="custom-btn custom-border-btn btn me-4">Create an
                                    account</a>
                            @endguest
                            <a href="{{ route('postJob') }}" class="custom-link">Post a job</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>



    </main>
@endsection
