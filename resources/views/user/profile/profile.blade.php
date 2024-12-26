@extends('user.source.template')
@section('content')
<main>
  
<hr>
<main class="main-profile">
    <div class="profile-head">
        <div class="profile-left">
            <img id="profile-image" src="{{ $user->profile_picture ? asset('uploads/users/' . $user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}" alt="profile image">
            <div class="profile-info">
                <h3 class="name">{{$user->first_name . ' ' . $user->last_name}}</h3>
                
                <p class="city">{{$user->user_governorate .', ' . $user->user_city}}</p>
            </div>
        </div>
        <div class="profile-right">
            <p> <strong> Member since:</strong> {{$user->created_at->format('Y-m-d')}}</p>
        </div>
    </div>
    
    <hr>
    <div class="bio">
        <div class="bio-header">
            <div class="bio-title"><h4 class="name">About {{$user->first_name}} :</h4></div>            
        </div>
        <div class="bio-body">
            <P>
                {{$user->bio}}
            </P>
            @if ($user->id === auth()->user()->id)
            <div class="bio-btn"> <a class="nav-link custom-btn btn" href="{{ route('editProfile') }}">edit profile</a> </div>
            @endif
           
        </div>
    </div>
    <hr>
    <!-- Navigation Bar for Tabs -->
    <div class="content-nav">
        <button class="tab-link active" data-tab="posts">{{$user->first_name .'\'s'}} Posts</button>

        @if(auth()->check() && auth()->user()->id === $user->id)
        <button class="tab-link" data-tab="pending">Pending jobs</button>
        @endif

        <button class="tab-link" data-tab="completed">Completed jobs</button>

        @if(auth()->check() && auth()->user()->id === $user->id)
        <button class="tab-link" data-tab="archived">archived posts</button>
        @endif


    </div>
    <!--user posts section -->
    <div class="content-section" id="posts"style="display: block;">
        <!-- Header with Title and Add Button -->


        @if ($user->id === auth()->user()->id)
            <div class="posts-header">
                <h4 class="posts-title"></h4>
                <button class="add-post-btn" onclick="location.href = '{{ route('postJob') }}';">+ Post a new job</button>
            </div>
        @endif
    
    
        <!-- Centered Posts Container -->
        <div class="posts-list">
        <div class="job-thumb d-flex">
                                

            <div class="col-lg-12 col-12">

                @foreach ($userPosts as $job)
                    <div class="job-thumb d-flex">
                        <div class="job-image-wrap bg-white shadow-lg">
                            <img src="{{ $job->job_media ? asset('uploads/jobs/' . $job->job_media) : asset('assets/user/images/defaults/defaultJob.jpg') }}"
                                class="urgent-job-image img-fluid" alt="">

                        </div>

                        <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                            <div class="mb-3">
                                <h4 class="job-title mb-lg-0">
                                    <a href="{{ route('JobDetails', $job->job_id) }}"
                                        class="job-title-link">{{ \Illuminate\Support\Str::limit($job->job_title, 15, '...') }}</a>
                                </h4>

                                <div class="d-flex flex-wrap align-items-center">
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
                                            <a href="{{route('filterJobs',['job_type' => $job->job_type,])}}"
                                                class="badge badge-level">{{ $job->job_type }}</a>
                                        </p>

                                        <p class="mb-0">
                                            <a href="{{route('filterJobs',['job_category' => $job->job_category,])}}"
                                                class="badge badge-level"
                                                class="badge">{{ $job->category->category_name }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="job-section-btn-wrap">
                                @if (!auth()->check() || (auth()->check() && auth()->user()->id != $job->user_id))
                                    <a href="{{ route('JobDetails', $job->job_id) }}" class="custom-btn2 btn">Apply
                                        now</a>
                                        
                                            
                                        @else
                                        <a href="{{ route('JobDetails', $job->job_id) }}" class="custom-btn btn">edit job</a>
                                      
                                @endif


                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pagination-container">
                    {{ $userPosts->render('pagination::bootstrap-5') }}
                </div>

            </div>
       </div>
                            <!-- 2 -->
                          
        </div>
    </div>
    {{-- end of user posts section --}}
    @if(auth()->check() && auth()->user()->id === $user->id)
    <div class="content-section" id="pending"  style="display: none;">
    <div class="job-thumb d-flex">
        <div class="col-lg-12 col-12">
           
            @foreach ($pendingApplications as $application)
                <div class="job-thumb d-flex">
                    <div class="job-image-wrap bg-white shadow-lg">
                        <img src="{{ $application->job->job_media ? asset('uploads/jobs/' . $application->job->job_media) : asset('assets/user/images/defaults/defaultJob.jpg') }}"
                            class="urgent-job-image img-fluid" alt="">

                    </div>

                    <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                        <div class="mb-3">
                            <h4 class="job-title mb-lg-0">
                                <a href="{{ route('JobDetails', $application->job->job_id) }}"
                                    class="job-title-link">{{ \Illuminate\Support\Str::limit($application->job->job_title, 15, '...') }}</a>
                            </h4>

                            <div class="d-flex flex-wrap align-items-center">
                                <p class="job-location mb-0">
                                    <i class="custom-icon bi-geo-alt me-1"></i>
                                    {{ $application->job->job_governorate . ', ' . $application->job->job_city }}
                                </p>

                                <p class="job-date mb-0">
                                    <i class="custom-icon bi-clock me-1"></i>
                                    {{ $application->job->created_at->diffForHumans() }}
                                </p>

                                <p class="job-price mb-0">
                                    <i class="custom-icon bi-cash me-1"></i>
                                    {{ $application->job->payment_amount }}
                                </p>

                                <div class="d-flex">
                                    <p class="mb-0">
                                        <a href="{{route('filterJobs',['job_type' => $application->job->job_type,])}}"
                                            class="badge badge-level">{{ $application->job->job_type }}</a>
                                    </p>

                                    <p class="mb-0">
                                        <a href="{{route('filterJobs',['job_category' => $application->job->job_category,])}}"
                                            class="badge badge-level"
                                            class="badge">{{ $application->job->category->category_name }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="job-section-btn-wrap">
            
                                <a href="{{ route('JobDetails', $application->job->job_id) }}" class="custom-btn2 btn">view/edit application</a>


                        </div>
                    </div>
                </div>
            @endforeach

            <div class="pagination-container">
                {{ $pendingApplications->render('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
    </div>
    @endif

    
    <div class="content-section" id="completed" style="display: none;">
    <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="images/logos/google.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.php" class="job-title-link">Technical Lead</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                Kuala, Malaysia
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                10 hours ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $20k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge badge-level">Internship</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge">Freelance</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="images/logos/apple.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.php" class="job-title-link">Business Director</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                California, USA
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                1 day ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $90k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge badge-level">Senior</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge">Full Time</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!--3  -->
                             <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="images/logos/slack.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.php" class="job-title-link">Dev Ops</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                Bangkok, Thailand
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                40 minutes ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $75k - 80k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge badge-level">Senior</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge">Part Time</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 4 -->
                            <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="images/logos/creative-market.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.php" class="job-title-link">UX Designer</a>
                                        </h4>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                Bangkok, Thailand
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                2 hours ago
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="custom-icon bi-cash me-1"></i>
                                                $100k
                                            </p>

                                            <div class="d-flex">
                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge badge-level">Entry</a>
                                                </p>

                                                <p class="mb-0">
                                                    <a href="job-listings.php" class="badge">Remote</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
    
    @if(auth()->check() && auth()->user()->id === $user->id)
    <div class="content-section" id="archived" style="display: none;">
        
        <div class="col-lg-12 col-12">

                @foreach ($archivedPosts as $job)
                    <div class="job-thumb d-flex">
                        <div class="job-image-wrap bg-white shadow-lg">
                            <img src="{{ $job->job_media ? asset('uploads/jobs/' . $job->job_media) : asset('assets/user/images/defaults/defaultJob.jpg') }}"
                                class="urgent-job-image img-fluid" alt="">

                        </div>

                        <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                            <div class="mb-3">
                                <h4 class="job-title mb-lg-0">
                                    <a href="{{ route('JobDetails', $job->job_id) }}"
                                        class="job-title-link">{{ \Illuminate\Support\Str::limit($job->job_title, 15, '...') }}</a>
                                </h4>

                                <div class="d-flex flex-wrap align-items-center">
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
                                            <a href="{{route('filterJobs',['job_type' => $job->job_type,])}}"
                                                class="badge badge-level">{{ $job->job_type }}</a>
                                        </p>

                                        <p class="mb-0">
                                            <a href="{{route('filterJobs',['job_category' => $job->job_category,])}}"
                                                class="badge badge-level"
                                                class="badge">{{ $job->category->category_name }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="job-section-btn-wrap">
                                @if (!auth()->check() || (auth()->check() && auth()->user()->id != $job->user_id))
                                    <a href="{{ route('JobDetails', $job->job_id) }}" class="custom-btn2 btn">Apply
                                        now</a>
                                        
                                            
                                        @else
                                        <a href="{{ route('JobDetails', $job->job_id) }}" class="custom-btn btn">edit job</a>
                                      
                                @endif


                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pagination-container">
                    {{ $archivedPosts->render('pagination::bootstrap-5') }}
                </div>

            </div> 
        
    </div>
    @endif
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const tabLinks = document.querySelectorAll(".tab-link");
    const contentSections = document.querySelectorAll(".content-section");

    // Function to switch between tabs
    function switchTab(tabId) {
        // Hide all content sections
        contentSections.forEach(function (section) {
            section.style.display = "none";
        });

        // Remove active class from all tabs
        tabLinks.forEach(function (tab) {
            tab.classList.remove("active");
        });

        // Show the selected content section and mark the tab as active
        const activeContent = document.getElementById(tabId);
        if (activeContent) {
            activeContent.style.display = "block";
        }

        const activeTab = document.querySelector(`.tab-link[data-tab="${tabId}"]`);
        if (activeTab) {
            activeTab.classList.add("active");
        }
    }

    // Set default active tab on page load (Your Posts)
    switchTab("posts");

    // Add event listeners to the tabs
    tabLinks.forEach(function (tab) {
        tab.addEventListener("click", function () {
            const tabId = tab.getAttribute("data-tab");
            switchTab(tabId);
        });
    });
});


</script>
</main>
@endsection