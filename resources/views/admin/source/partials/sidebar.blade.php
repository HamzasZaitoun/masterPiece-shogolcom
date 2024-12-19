<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="shortcut icon" href="{{asset('assets/images/logo1.png')}}" type="image/x-icon')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>admin Dashboard | Jobs</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="{{asset('assets/images/logo1.png')}}">
                    <h2>Seasonal<span class="danger">Jobs</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                {{-- "{{Route('admin.users')}}" --}}
                <a class="nav-link"> 
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="{{Route('admin.users.index')}}" class="nav-link">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Users</h3>
                </a>
                <a href="{{Route('admin.jobs.index')}}" class="nav-link">
                <span class="material-icons-sharp">business_center</span>
                    <h3>Jobs</h3>
                </a>
                <a href="{{Route('admin.categories.index')}}" class="nav-link">
                    <span class="material-icons-sharp">
                        category
                    </span>
                    <h3>Categories</h3>
                </a>
                <a href="{{Route('admin.payments.index')}}" class="nav-link">
                    <span class="material-icons-sharp">
                        attach_money
                    </span>
                    <h3>Payments</h3>
                </a>
                <a href="{{Route('admin.applications.index')}}" class="nav-link">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Application</h3>
                </a>
                <a href="{{Route('admin.websiteReviews.index')}}" class="nav-link">
                    <span class="material-icons-sharp">
                    stars
                    </span>
                    <h3>Reviews</h3>
                </a>
                <a href="{{Route('admin.usersReviews.index')}}" class="nav-link">
                    <span class="material-icons-sharp">
                        thumbs_up_down
                    </span>
                    <h3>Users reviews</h3>
                </a>
                {{-- <a href="{{route('admin.dashboard')}}"> --}}
                <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>  
        <main>
 <div class="right-section">
            <div class="nav">
                <a href="{{Route('admin.contactUs.index')}}" class="nav-link">
                    <span class="material-icons-sharp Messages">
                        forum
                    </span>
                </a>
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>