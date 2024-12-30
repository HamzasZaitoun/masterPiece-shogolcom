<section class="hero-section d-flex justify-content-center align-items-center">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                <div class="hero-section-text mt-5">
                    <h6 class="text-white">post seasonal jobs or apply for one.</h6>

                    <h1 class="hero-title text-white mt-4 mb-4">Find the Perfect seasonal Job<br> or Post One Today!</h1>
                    @auth
                    <a href="{{route('postJob')}}" class="custom-btn text-white hero-border-btn custom-border-btn btn">Post Now</a>
                    @endauth
                    @guest
                    <a href="{{route('login')}}" class="custom-btn text-white hero-border-btn custom-border-btn btn">Post Now</a>
                    @endguest
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <form class="custom-form hero-form" action="{{route('jobs')}}" method="get" role="form">
                    <h4 class="text-white mb-3">Are you looking for seasonal job?</h4>
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <button type="submit" class="form-control">
                                <a href="{{route('jobs')}}" class="text-white" >find it!</a>
                            </button>
                        </div>

                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
