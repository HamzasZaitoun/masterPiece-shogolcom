@extends('user.source.template')
@section('content')
<main>

    <header class="site-header">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 col-12 text-center ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">{{$category->category_name}}</li>
                        </ol>
                       
                    </nav>

                    <h1 class="text-white mt-4">{{$category->category_name}} </h1>

                    
                    <h4 class="text-white mt-3">{{$category->category_description}}</h4>
                </div>

            </div>
        </div>
    </header>

    <section class="job-section section-padding">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-12 mb-lg-4">
                    @if ($jobs->isEmpty())
                        <h3>No jobs found, please try again later</h3>
                    @else
                        <h3>Results of {{ $jobs->firstItem() }}-{{ $jobs->lastItem() }} of {{ $jobs->total() }} jobs
                        </h3>
                    @endif
                </div>

                <div class="col-lg-4 col-12 d-flex align-items-center ms-auto mb-5 mb-lg-4">
                    <p class="mb-0 ms-lg-auto"></p>

                   

                    
                </div>

                @foreach ($jobs as $job)
                    <div class="col-lg-4 col-md-6 col-12 job-card">
                        <div class="job-thumb job-thumb-box">
                            <div class="job-image-box-wrap">
                                <a href="{{ route('JobDetails', $job->job_id) }}">
                                    <img src="{{ $job->job_media ? asset('uploads/jobs/' . $job->job_media) : asset('assets/user/images/defaults/defaultJob.jpg') }}"
                                        class="job-image img-fluid" alt="">
                                </a>

                                <div class="job-image-box-wrap-info d-flex align-items-center">
                                    <p class="mb-0">
                                        <a href="job-listings.php" class="badge badge-level">{{ $job->job_type }}</a>
                                    </p>

                                    <p class="mb-0">
                                        <a href="job-listings.php" class="badge">{{$job->category->category_name}}</a>
                                    </p>
                                </div>
                            </div>

                            <div class="job-body">
                                <h4 class="job-title">
                                    <a href="job-details.php"
                                        class="job-title-link">{{ \Illuminate\Support\Str::limit($job->job_title, 15, '...') }}</a>
                                </h4>

                                <div class="d-flex align-items-center">
                                    <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                        <img src="{{ asset('assets/user/images/logos/salesforce.png') }}"
                                            class="job-image me-3 img-fluid" alt="">

                                        <p class="mb-0">{{ $job->user->first_name . ' ' . $job->user->last_name }}
                                        </p>
                                    </div>

                                    <a href="#" class="bi-bookmark ms-auto me-2">
                                    </a>

                                    <a href="#" class="bi-heart">
                                    </a>
                                </div>

                                <div class="d-flex align-items-center">
                                    <span class="job-location">
                                        <i class="custom-icon bi-geo-alt me-1"></i>
                                        {{ $job->job_governorate . ', ' . $job->job_city }}
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

                <div class="pagination-container">
                    {{ $jobs->render('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </section>


    <section class="cta-section">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-10">
                    <h2 class="text-white mb-2"> job Opportunities</h2>
                
                    <p class="text-white">
                        Shogholcom offers a wide range of seasonal and temporary job openings across various industries. Connect with trusted employers and find the perfect job that matches your skills and schedule—all on Shogholcom.
                    </p>
                </div>

                <div class="col-lg-4 col-12 ms-auto">
                    <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                        @guest
                        <a href="#" class="custom-btn custom-border-btn btn me-4">Create an account</a>
                        @endguest
                        <a href="{{route('postJob')}}" class="custom-link">Post a job</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection