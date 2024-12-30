@extends('user.source.template')
@section('content')
<main>

        <header class="site-header">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">About Shogholcom</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>


        <section class="about-section">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="col-lg-5 col-12 mt-5 text-center">
                        <div class="about-info-text">
                            <h2 class="mb-0">Shogholcom</h2>

                            <h4 class="mb-2 mt-2">Get hired. Or post job</h4>

                        

                            <div class="d-flex align-items-center mt-4  justify-content-center">
                                <a href="#services-section" class="custom-btn custom-border-btn btn me-4">Explore Services</a>

                                <a href="{{route('contact')}}" class="custom-link smoothscroll">Contact</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>


        <section class="services-section section-padding" id="services-section">
            <div class="container">
                <div class="row">
        
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5">Our Key Services</h2>
                    </div>
        
                    <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                        <div class="services-block">
                            <div class="services-block-title-wrap">
                                <i class="services-block-icon bi-window"></i>
        
                                <h4 class="services-block-title">Job Posting</h4>
                            </div>
        
                            <div class="services-block-body">
                                <p>Post seasonal jobs quickly and easily with clear details for job seekers.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="services-block-wrap col-lg-4 col-md-6 col-12 my-4 my-lg-0 my-md-0">
                        <div class="services-block">
                            <div class="services-block-title-wrap">
                                <i class="services-block-icon bi-twitch"></i>
        
                                <h4 class="services-block-title">Job Matching</h4>
                            </div>
        
                            <div class="services-block-body">
                                <p>Our system connects job seekers with the best-fit opportunities.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="services-block-wrap col-lg-4 col-md-6 col-12">
                        <div class="services-block">
                            <div class="services-block-title-wrap">
                                <i class="services-block-icon bi-chat"></i>
        
                                <h4 class="services-block-title">Communication</h4>
                            </div>
        
                            <div class="services-block-body">
                                <p>Enable seamless communication between employers and job seekers once a job is accepted.</p>
                            </div>
                        </div>
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