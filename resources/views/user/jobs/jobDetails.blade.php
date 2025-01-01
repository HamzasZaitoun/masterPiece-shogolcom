@extends('user.source.template')
@section('content')
  
    <main>
        {{-- @dd($job->job_status) --}}
        <header class="site-header">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h1 class="text-white">Job Details</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Job Details</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </header>


        <section class="job-section section-padding pb-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12">
                        <h2 class="job-title mb-0">
                            {{ $job->job_title }}
                        </h2>

                        <div class="job-thumb job-thumb-detail">
                            <div class="d-flex flex-wrap align-items-center border-bottom pt-lg-3 pt-2 pb-3 mb-4">
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
                                        <a href="job-listings.php" class="badge badge-level">{{ $job->job_type }}</a>
                                    </p>

                                    <p class="mb-0">
                                        <a href="job-listings.php" class="badge">
                                            {{ $job->category->category_name }}
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <h4 class="mt-4 mb-2">Job Description</h4>

                            <p>{{ $job->job_description }}</p>

                            <h5 class="mt-4 mb-3">Additional information</h5>

                            <p class="mb-1"><strong>Start date: </strong>{{ $job->start_date }}</p>

                            <p><strong>Number of workers needed: </strong>{{ $job->number_of_workers }}</p>

                            <p><strong>job duration: </strong>{{ $job->job_duration}} days</p>


                            {{-- check if the user is not the job owner//job seeker mode --}}
                            @if (!auth()->check() || (auth()->check() && auth()->user()->id != $job->user_id)) 

                                <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                                    @if ($hasApplied && $job->job_status != 'closed')
                                        <!-- If user has applied, show "Delete Application" button -->
                                        <a class="custom-btn btn mt-2 btn-danger"
                                            onclick="confirmAction('{{ route('deleteApplication', $job->job_id) }}', 'Do you really want to delete your application? This action cannot be undone!', 'Yes, delete it!', 'Cancel', 'warning')">
                                            Delete Application
                                        </a>
                                    @elseif(!auth()->check())
                                        <!-- If user has not applied, show "Apply Now" button -->
                                        <a href="{{ route('login') }}" class="custom-btn btn mt-2 btn-primary">
                                            login to apply
                                        </a>
                                        
                                    @elseif(!$hasApplied)
                                        <a class="custom-btn btn mt-2 btn-primary"
                                            onclick="confirmAction('{{ route('applyToJob', $job->job_id) }}', 'did you read all the job information!', 'Yes, apply now!', 'keep reading', 'info')">
                                            Apply Now
                                        </a>
                                        <a href="#" class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3">Save this
                                            job</a>
                                    @elseif($isAccepted && @isset($existingApplication))
                                        <a class="custom-btn btn mt-2 btn-primary"
                                            onclick="confirmAction('{{ route('completeJobByApplication',$existingApplication->application_id) }}', 'did you finish all the job requirements?', 'Yes, mark the job as completed!', 'wait! i forgot something', 'info')">
                                            Complete the job

                                        </a>
                                        <a href="{{ route('archiveJob', $job->job_id) }}"
                                            class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3">report a problem</a>
                                    @endif


                                   

                                    <div class="job-detail-share d-flex align-items-center">
                                        <p class="mb-0 me-lg-4 me-3">Share:</p>

                                        <a href="#" class="bi-share"></a>
                                    </div>
                                </div>
                        </div>
                    </div>
                    

                @elseif ( auth()->user()->id === $job->user_id)
                    <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                        {{-- check if the job is still open so the user can edit and archive the job --}}
                        @if($job->job_status!='closed')
                        <a href="#" class="custom-btn btn mt-2">edit job details</a>

                        <a href="{{ route('archiveJob', $job->job_id) }}"
                            class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3">archive job</a>
                        <!-- Cancel Job Button (Triggers the Modal) -->
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#cancelJobModal"
class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3 bg-danger text-white">Cancel job post</a>

<!-- Cancel Job Modal -->
<div class="modal fade" id="cancelJobModal" tabindex="-1" aria-labelledby="cancelJobModalLabel" aria-hidden="true">
<div class="modal-dialog">
 <div class="modal-content">
   <div class="modal-header">
     <h5 class="modal-title" id="cancelJobModalLabel">Cancel Job</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
     <!-- Form to Select Cancellation Reason -->
     <form action="{{ route('cancelJob', $job->job_id) }}" method="POST">
       @csrf
       <div class="mb-3">
         <label for="cancellationReason" class="form-label">Reason for Cancellation</label>
         <select class="form-select" name="cancellation_reason" id="cancellationReason" required>
           <option value="" selected disabled>Select a reason</option>
           <option value="No longer needed">No longer needed</option>
           <option value="Found someone elsewhere">Found someone elsewhere</option>
           <option value="it took too much time">it took too much time</option>
           <option value="Other">Other</option>
         </select>
       </div>

       <!-- Hidden Input Field for "Other" Reason -->
       <div class="mb-3 d-none" id="otherReasonDiv">
         <label for="otherReason" class="form-label">Please specify</label>
         <input type="text" class="form-control" name="other_reason" id="otherReason" placeholder="Enter reason" maxlength="255">
       </div>

       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-danger">Submit Cancellation</button>
       </div>
     </form>
   </div>
 </div>
</div>
</div>


                        @elseif($job->job_status==='closed')

                        <a class="custom-btn btn mt-2 btn-primary"
                        onclick="confirmAction('{{ route('applyToJob', $job->job_id) }}', 'did you read all the job information!', 'Yes, apply now!', 'keep reading', 'info')">
                        Complete the job
                         </a>
                        <a href="{{ route('archiveJob', $job->job_id) }}"
                            class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3">report a problem</a>
                        @endif
                        <div class="job-detail-share d-flex align-items-center">
                            <p class="mb-0 me-lg-4 me-3">Share:</p>

                            <a href="#" class="bi-share"></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- @if (!auth()->check() || $job->user->id != auth()->user()->id) --}}
            <div class="col-lg-4 col-12 mt-5 mt-lg-0">
                <div class="job-thumb job-thumb-detail-box bg-white shadow-lg">

                    <div class="job-image-box-wrap">
                        <a href="{{ route('JobDetails', $job->job_id) }}">
                            <img src="{{ $job->job_media ? asset('uploads/jobs/' . $job->job_media) : asset('assets/user/images/defaults/defaultJob.jpg') }}"
                                class="job-image img-fluid" alt="">
                        </a>


                    </div>

                </div>
                <div class="job-thumb job-thumb-detail-box bg-white shadow-lg">
                    <div class="d-flex align-items-center">
                        <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mb-3">
                            <img src="{{ $job->user->profile_picture ? asset('uploads/users/' . $job->user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}"
                                class="urgent-job-image" alt="">
                        </div>

                        <a href="#" class="bi-bookmark ms-auto me-2"></a>

                        <a href="#" class="bi-heart"></a>
                    </div>

                    <h6 class="mt-3 mb-2">About
                        @if (auth()->check() && auth()->user()->id != $job->user->id)
                            <a href="{{ route('userProfile', $job->user->id) }}">
                            @else
                                <a href="{{ route('profile', $job->user->id) }}">
                        @endif
                        {{ $job->user->first_name }}</a>
                    </h6>

                    <p>{{ $job->user->bio }}</p>
                </div>
            </div>
            {{-- @endif        --}}

            </div>
            </div>
        </section>



        {{-- similer jobs section --}}
        @if (!auth()->check() || (auth()->check() && auth()->user()->id != $job->user_id && $job->job_status === 'open'))
        
           
            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-lg-4">
                            <h3>Similar Jobs</h3>

                            <p><strong>Over 10k opening jobs</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing
                                kengan omeg kohm tokito adipcingi elit eismuod larehai</p>
                        </div>

                        <div class="col-lg-4 col-12 d-flex ms-auto mb-5 mb-lg-4">
                            <a href="{{ route('jobs') }}" class="custom-btn custom-border-btn btn ms-lg-auto">Browse Job
                                Listings</a>
                        </div>

                        @foreach ($similerJobs as $job)
                            <div class="col-lg-4 col-md-6 col-12 job-card">
                                <div class="job-thumb job-thumb-box">
                                    <div class="job-image-box-wrap">
                                        <a href="{{ route('JobDetails', $job->job_id) }}">
                                            <img src="{{ $job->job_media ? asset('uploads/jobs/' . $job->job_media) : asset('assets/user/images/defaults/defaultJob.jpg') }}"
                                                class="job-image img-fluid" alt="">
                                        </a>

                                        <div class="job-image-box-wrap-info d-flex align-items-center">
                                            <p class="mb-0">
                                                <a href="job-listings.php"
                                                    class="badge badge-level">{{ $job->job_type }}</a>
                                            </p>

                                            <p class="mb-0">
                                                <a href="job-listings.php"
                                                    class="badge">{{ $job->category->category_name }}</a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-body">
                                        <h4 class="job-title">
                                            <a href="job-details.php"
                                                class="job-title-link">{{ \Illuminate\Support\Str::limit($job->job_title, 15, '...') }}</a>
                                        </h4>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                                <img src="{{ $job->user->profile_picture ? asset('uploads/users/' . $job->user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}"
                                                    class="job-image2 " alt="">

                                                <p class="mb-0">
                                                    {{ $job->user->first_name . ' ' . $job->user->last_name }}</p>
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
                    </div>
                </div>
            </section>

        {{-- end of similer jobs section --}}

        @elseif(auth()->user()->id === $job->user_id && $job->job_status === 'open')
            {{-- job applications section --}}
            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-lg-4">
                            <h3>Job Applications</h3>

                            <p><strong>Over 10k opening jobs</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing
                                kengan omeg kohm tokito adipcingi elit eismuod larehai</p>
                        </div>

                        <div class="col-lg-4 col-12 d-flex ms-auto mb-5 mb-lg-4">

                        </div>
                        @foreach ($jobApplications as $application)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="job-thumb job-thumb-box">
                                    <div class="job-image-box-wrap">
                                        <a href="{{ route('userProfile', $application->user_id) }}">
                                            <img src="{{ $application->user->profile_picture ? asset('uploads/users/' . $application->user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}"
                                                class="job-image img-fluid" alt="go to profile">
                                        </a>


                                    </div>

                                    <div class="job-body">
                                        <h4 class="job-title">
                                            <a href="{{ route('userProfile', $application->user_id) }}"
                                                class="job-title-link">{{ $application->user->first_name }}</a>
                                        </h4>



                                        <div class="d-flex align-items-center">
                                            <p class="job-location">
                                                <i class="custom-icon bi-geo-alt me-1"></i>
                                                {{ $application->user->user_governorate . ', ' . $application->user->user_city }}
                                            </p>

                                            <p class="job-date">
                                                <i class="custom-icon bi-clock me-1"></i>
                                                {{ $application->applied_at }}
                                            </p>
                                        </div>
                                        <div class="container justify-center">
                                            <div class=" text-center border-top pt-3">
                                                <a href="{{ route('acceptApplication', $application->application_id) }}"
                                                    class="custom-btn btn ms-auto">Accept</a>

                                                <a href="{{ route('regectApplication', $application->application_id) }}"
                                                    class="custom-btn btn ms-auto">Reject</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
            {{-- end of job applcations section --}}

        @elseif((auth()->user()->id === $job->user_id && $job->job_status === 'closed') || $isAccepted)

            <section class="job-section section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-12 mb-lg-4">
                            @if(auth()->user()->id===$job->user_id)
                            <h3>Your workers</h3>

                            <p><strong>bellow you find the list of the workers working in your job </strong></p>
                            @else
                            <h3>Job workers</h3>
                            <p><strong>bellow you find the list of the workers working on this job with you</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-4 col-12 d-flex ms-auto mb-5 mb-lg-4">

                        </div>
                        @foreach ($workers as $application)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="job-thumb job-thumb-box">
                                    <div class="job-image-box-wrap">
                                        @if(auth()->user()->id===$application->user_id)
                                        <a href="{{ route('profile')}}">
                                        @else
                                        <a href="{{ route('userProfile', $application->user_id) }}">
                                        @endif
                                            <img src="{{ $application->user->profile_picture ? asset('uploads/users/' . $application->user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}"
                                                class="job-image img-fluid" alt="go to profile">
                                        </a>


                                    </div>

                                    <div class="job-body">
                                        <h4 class="job-title">
                                            @if(auth()->user()->id===$application->user_id)

                                            <a href="{{ route('profile')}}"
                                                class="job-title-link">You</a>
                                            @else
                                            <a href="{{ route('userProfile', $application->user_id) }}"
                                                class="job-title-link">{{ $application->user->first_name . ' ' .$application->user->last_name }}</a>
                                            @endif
                                        </h4>



                                        <div class="d-flex align-items-center">
                                           <p> phone: {{$application->user->mobile_number}}
                                           </p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            
                                            <p class="{{ $application->completed_at ? 'text-success' : 'text-danger' }}">
                                                {{ $application->completed_at 
                                                    ? $application->user->first_name . ' completed the job succefully ' 
                                                    : $application->user->first_name . ' is still working' }}
                                            </p>
                                            
                                            
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
        @endif


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
                                <a href="{{ route('login') }}" class="custom-btn custom-border-btn btn me-4">Create an
                                    account</a>
                            @endguest
                            <a href="{{ route('postJob') }}" class="custom-link">Post a job</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>



    </main>
    <script>
 document.getElementById('cancellationReason').addEventListener('change', function() {
  const otherReasonDiv = document.getElementById('otherReasonDiv');
  const otherReasonInput = document.getElementById('otherReason');

  // Show the "Other" input field if "Other" is selected
  if (this.value === 'Other') {
    otherReasonDiv.classList.remove('d-none');
    otherReasonInput.setAttribute('required', 'required'); // Make the input required
  } else {
    otherReasonDiv.classList.add('d-none');
    otherReasonInput.removeAttribute('required'); // Remove required attribute if not "Other"
    otherReasonInput.value = ''; // Clear the input value
  }
});

    </script>
@endsection
