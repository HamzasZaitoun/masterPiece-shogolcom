
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}">
                <img src="{{asset('assets/user/images/publicSiteLogo.png')}}" class="img-fluid logo-image">

                <div class="d-flex flex-column">
                    <strong class="logo-text">Shogholcom</strong>
                    <small class="logo-slogan">Your Online seasonal Job Portal</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-center ms-lg-5">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
            
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                    </li>
            
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ in_array(Route::currentRouteName(), ['job-listings', 'job-details', 'post-job']) ? 'active' : '' }}" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Jobs</a>
            
                        {{-- <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item {{ Route::currentRouteName() == '' ? 'active' : '' }}" href="{{ route('job-listings') }}">Job Listings</a></li>
            
                            <li><a class="dropdown-item {{ Route::currentRouteName() == '' ? 'active' : '' }}" href="{{ route('job-details') }}">Job Details</a></li>
            
                            <li><a class="dropdown-item {{ Route::currentRouteName() == '' ? 'active' : '' }}" href="{{ route('post-job') }}">Post a Job</a></li>
                        </ul> --}}
                    </li>
            
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
            
                    <li class="nav-item ms-lg-auto">
                        @auth
                            <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
                        @endauth
                    </li>
            
                    <li class="nav-item">
                        @guest
                            <a class="nav-link custom-btn btn" href="{{ route('login') }}">Sign in/up</a>
                        @endguest
            
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link custom-btn btn">Logout</button>
                            </form>
                        @endauth
                    </li>
                </ul>
            </div>
            
        </div>
    </nav>