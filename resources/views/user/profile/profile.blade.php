@extends('user.source.template')
@section('content')
<main>

<hr>
<main class="main-profile">
    <div class="profile-head">
        <div class="profile-left">
            <img id="profile-image" src="images/people-working-as-team-company.jpg" alt="profile image">
            <div class="profile-info">
                <h3 class="name">{{$user->first_name . ' ' . $user->last_name}}</h3>
                <p class="headline">Full Stack Developer</p>
                <p class="city">{{$user->user_governorate .', ' . $user->user_city}}</p>
            </div>
        </div>
        <div class="profile-right ">
            <div class="rating">
                <!-- Star Rating: 5 Stars -->
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="5 stars">
                    <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="star-solid">
                    <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                    </svg>
                </label>

                <!-- Star Rating: 4 Stars -->
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="4 stars">
                    <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="star-solid">
                    <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                    </svg>
                </label>

                <!-- Star Rating: 3 Stars (Default selected) -->
                <input type="radio" id="star3" name="rate" value="3" checked />
                <label for="star3" title="3 stars">
                    <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="star-solid">
                    <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                    </svg>
                </label>

                <!-- Star Rating: 2 Stars -->
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="2 stars">
                    <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="star-solid">
                    <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                    </svg>
                </label>

                <!-- Star Rating: 1 Star -->
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="1 star">
                    <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="star-solid">
                    <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                    </svg>
                </label>
            </div>
        </div>
    </div>
    <hr>
    <div class="bio">
        <div class="bio-header">
            <div class="bio-title"><h4 class="name">Bio :</h4></div>            
        </div>
        <div class="bio-body">
            <P>
                {{$user->bio}}
            </P>
            <div class="bio-btn"><button>Edit profile</button></div>
        </div>
    </div>
    <hr>
    {{-- <!-- Navigation Bar for Tabs -->
    <div class="content-nav">
        <button class="tab-link active" data-tab="posts">Your Posts</button>
        <button class="tab-link" data-tab="completed">Completed jobs</button>
        <button class="tab-link" data-tab="pending">Pending jobs</button>
    </div>
    <!-- Content Sections -->
    <div class="content-section" id="posts">
        <!-- Header with Title and Add Button -->
        <div class="posts-header">
            <h4 class="posts-title"></h4>
            <button class="add-post-btn"onclick="location.href = 'newPost.php';">+ Add New Post</button>
        </div>

        <!-- Centered Posts Container -->
        <div class="posts-list">
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

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.php" class="custom-btn btn">View</a>
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

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.php" class="custom-btn btn">View</a>
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

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.php" class="custom-btn btn">View</a>
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

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.php" class="custom-btn btn">View</a>
                                    </div>
                                </div>
                            </div>
        </div>
    </div>

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

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.php" class="custom-btn btn">View</a>
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

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.php" class="custom-btn btn">View</a>
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

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.php" class="custom-btn btn">View</a>
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

                                    <div class="job-section-btn-wrap">
                                        <a href="job-details.php" class="custom-btn btn">View</a>
                                    </div>
                                </div>
                            </div>
    </div>

    <div class="content-section" id="pending" style="display: none;">
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
    </div> --}}


</main>
@endsection