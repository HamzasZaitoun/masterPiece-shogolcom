@extends('admin.source.template')
@section('content')

@php
    // Circle circumference for r=36 is approximately 226.08 (2 * pi * 36)
    $circumference = 2 * pi() * 36;
@endphp

<h1>Analytics</h1>
            <!-- Analyses -->
            <div class="analyse">
                <!-- Total Jobs -->
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total jobs</h3>
                            <h1>{{$totalJobs}}</h1>
                        </div>
                        <div class="progresss">
                            <svg width="80" height="80">
                                <circle cx="38" cy="38" r="36" stroke-dasharray="{{ $circumference }}" stroke-dashoffset="0"></circle>
                            </svg>
                            <div class="percentage">
                                <p>100%</p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Completed Jobs -->
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Completed jobs</h3>
                            <h1>{{$completedJobs}}</h1>
                        </div>
                        <div class="progresss">
                            <svg width="80" height="80">
                                <circle cx="38" cy="38" r="36" stroke-dasharray="{{ $circumference }}" 
                                stroke-dashoffset="{{ $circumference - ($completedJobsPercentage / 100) * $circumference }}"></circle>
                            </svg>
                            <div class="percentage">
                                <p>{{$completedJobsPercentage}}%</p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Pending Jobs -->
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Pending jobs</h3>
                            <h1>{{$pendingJobs}}</h1>
                        </div>
                        <div class="progresss">
                            <svg width="80" height="80">
                                <circle cx="38" cy="38" r="36" stroke-dasharray="{{ $circumference }}" 
                                stroke-dashoffset="{{ $circumference - ($pendingJobsPercentage / 100) * $circumference }}"></circle>
                            </svg>
                            <div class="percentage">
                                <p>{{ $pendingJobsPercentage }}%</p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Cancelled Jobs -->
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Cancelled jobs</h3>
                            <h1>{{$cancelledJobs}}</h1>
                        </div>
                        <div class="progresss">
                            <svg width="80" height="80">
                                <circle cx="38" cy="38" r="36" stroke-dasharray="{{ $circumference }}" 
                                stroke-dashoffset="{{ $circumference - ($cancelledJobsPercentage / 100) * $circumference }}"></circle>
                            </svg>
                            <div class="percentage">
                                <p>{{$cancelledJobsPercentage}}%</p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Daily Active Users -->
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Number of daily active users</h3>
                            <h1>{{$dailyUsers}}</h1>
                        </div>
                        <div class="progresss">
                            <svg width="80" height="80">
                                <circle cx="38" cy="38" r="36" stroke-dasharray="{{ $circumference }}" 
                                stroke-dashoffset="{{ $circumference - ($dailyUsersPercentage / 100) * $circumference }}"></circle>
                            </svg>
                            <div class="percentage">
                                <p>{{  $dailyUsersPercentage }}%</p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Custom Categories -->
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Custom categories</h3>
                            <h1>{{$customCategories}}</h1>
                        </div>
                        <div class="progresss">
                            <svg width="80" height="80">
                                <circle cx="38" cy="38" r="36" stroke-dasharray="{{ $circumference }}" 
                                stroke-dashoffset="{{ $circumference - ($customCategoriesPercentage / 100) * $circumference }}"></circle>
                            </svg>
                            <div class="percentage">
                                <p>{{$customCategoriesPercentage}}%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New Users Section -->
            <div class="new-users">
                <h2>New Users</h2>
                <div class="user-list">
                    @foreach($latestUsers as $user)
                        <div class="user">
                            <a href="{{ route('admin.users.userDetails', ['id' => $user->id]) }}">
                            <img src="{{ $user->profile_picture ? asset('uploads/users/' . $user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}" alt="{{ $user->first_name }}">
                        </a>
                            <h2>{{ $user->first_name }}</h2>
                            <p>{{ $user->created_at->diffForHumans() }}</p>
                        </div>
                    @endforeach
                    <!-- Optionally, add a "More" button if you want -->
                  
                </div>
            </div>
            
        </main>
@endsection