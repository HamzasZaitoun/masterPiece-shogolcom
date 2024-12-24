@extends('user.source.template')
@section('content')
    <main>

        <header class="site-header">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">Job Listings</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Job listings</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>

        <section class="section-padding pb-0 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <form class="custom-form hero-form" action="{{ route('filterJobs') }}" method="GET"
                            role="form">
                            @csrf
                            <h3 class="text-white mb-3">Search jobs that suits you</h3>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="bi-person custom-icon"></i></span>

                                        <input type="text" name="job_title" id="job-title" class="form-control"
                                            placeholder="Job Title">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="bi-geo-alt custom-icon"></i></span>

                                        <select name="governorate" id="governorate" class="form-select form-control ">
                                            <option value="">Select governorates</option>
                                            @foreach ($governorates as $governorate)
                                                <option value="{{ $governorate->governorate_name }}">
                                                    {{ $governorate->governorate_name }}</option>
                                            @endforeach

                                        </select>



                                    </div>

                                </div>




                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="bi-cash custom-icon"></i></span>

                                        <select class="form-select form-control" name="payment_range" id="payment_range"
                                            aria-label="Default select example">
                                            <option value="">payment Range</option>
                                            <option value="1">$0 - $20</option>
                                            <option value="2">$21 - $30</option>
                                            <option value="3">$31 - $40</option>
                                            <option value="4">$41 and above</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="bi-laptop custom-icon"></i></span>

                                        <select class="form-select form-control" name="job_type" id="job_type"
                                            aria-label="Default select example">
                                            <option value="">job type</option>
                                            <option value="day">daily</option>
                                            <option value="month">monthly</option>
                                            <option value="project">per project</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="bi-laptop custom-icon"></i></span>

                                        <select class="form-select form-control" name="category" id="category"
                                            aria-label="Default select example">
                                            <option value="">job category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->category_id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <button type="submit" class="form-control">
                                        Search job
                                    </button>
                                </div>


                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6 col-12">
                        <img src="images/4557388.png" class="hero-image img-fluid" alt="">
                    </div>

                </div>
            </div>
        </section>


        <section class="job-section section-padding">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-12 mb-lg-4">
                        @if ($jobs->isEmpty())
                            <h3>No results found. Please try adjusting your search filters.</h3>
                        @else
                            <h3>Results of {{ $jobs->firstItem() }}-{{ $jobs->lastItem() }} of {{ $jobs->total() }} jobs
                            </h3>
                        @endif
                    </div>

                    <div class="col-lg-4 col-12 d-flex align-items-center ms-auto mb-5 mb-lg-4">
                        <p class="mb-0 ms-lg-auto">Sort by:</p>

                        <div class="dropdown dropdown-sorting ms-3 me-4">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSortingButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Newest Jobs
                            </button>

                            <ul class="dropdown-menu" aria-labelledby="dropdownSortingButton">
                                <li><a class="dropdown-item" href="#">Lastest Jobs</a></li>

                                <li><a class="dropdown-item" href="#">Highed Salary Jobs</a></li>

                                <li><a class="dropdown-item" href="#">Internship Jobs</a></li>
                            </ul>
                        </div>

                        <div class="d-flex">
                            <a href="#" class="sorting-icon active bi-list me-2"></a>

                            <a href="#" class="sorting-icon bi-grid"></a>
                        </div>
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
                                            <a href="job-listings.php" class="badge">Freelance</a>
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
                        <h2 class="text-white mb-2">Over 10k opening jobs</h2>

                        <p class="text-white">Gotto Job is a free HTML CSS template for job hunting related websites. This
                            layout is based on the famous Bootstrap 5 CSS framework. Thank you for visiting Tooplate
                            website.</p>
                    </div>

                    <div class="col-lg-4 col-12 ms-auto">
                        <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                            <a href="#" class="custom-btn custom-border-btn btn me-4">Create an account</a>

                            <a href="#" class="custom-link">Post a job</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
