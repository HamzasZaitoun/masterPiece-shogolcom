
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}">
                <img src="{{asset('assets/user/images/publicSiteLogo.png')}}" class="img-fluid logo-image">

                <div class="d-flex flex-column">
                    <strong class="logo-text">Gotto</strong>
                    <small class="logo-slogan">Your Online Job Portal</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-center ms-lg-5">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home')}}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Jobs</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="job-listings.php">Job Listings</a></li>

                            <li><a class="dropdown-item" href="job-details.php">Job Details</a></li>
                            <li><a class="dropdown-item" href="job-details.php">Post a job</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-auto">
                        @auth
                       
                            <a class="nav-link" href="">Profile</a>
                        @endauth
                    </li>
                    
                    <li class="nav-item">
                        @guest
                            <!-- Show Sign in/up if the user is not logged in -->
                            <a class="nav-link custom-btn btn" href="{{ route('login') }}">Sign in/up</a>
                        @endguest
                    
                        @auth
                            <!-- Show Logout if the user is logged in -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link custom-btn btn" >Logout</button>
                            </form>
                        @endauth
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>