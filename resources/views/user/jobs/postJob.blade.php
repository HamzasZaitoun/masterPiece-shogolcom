@extends('user.source.template')
@section('content')
<main>

    <section class="new-post-section section-padding pb-0">
        <div class="container">
            <h2 class="new-post-title mb-0 text-center ">Post a new job</h2>
            <div class="row  bg-white">
                
                 <div class="col-lg-8 col-12 mx-auto">
                    <form class="custom-form contact-form" action="#" method="post" role="form">
                       

                        <div class="row">
                            
                        
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="job-title">Job Title</label>
                                <input type="text" name="job_title" id="job-title" class="form-control" placeholder="Enter Job Title" maxlength="255" required>
                            </div>
                        
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="job-governate">Job Governate</label>
                                <input type="text" name="job_governate" id="job-governate" class="form-control" placeholder="Enter Governate" maxlength="255" required>
                            </div>
                        
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="job-city">Job City</label>
                                <input type="text" name="job_city" id="job-city" class="form-control" placeholder="Enter City" maxlength="255" required>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="job-city">Job City</label>
                                <input type="text" name="job_city" id="job-city" class="form-control" placeholder="Enter City" maxlength="255" required>
                            </div>
                        
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="job-type">Job Type</label>
                                <select name="job_type" id="job-type" class="form-control" required>
                                    <option value="" disabled selected>Select Job Type</option>
                                    <option value="day">Day</option>
                                    <option value="month">Month</option>
                                    <option value="project">Project</option>
                                </select>
                            </div>
                        
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="payment-amount">Payment Amount</label>
                                <input type="number" name="payment_amount" id="payment-amount" class="form-control" placeholder="Enter Payment Amount" min="0" required>
                            </div>
                        
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="job-duration">Job Duration (days)</label>
                                <input type="number" name="job_duration" id="job-duration" class="form-control" placeholder="Enter Duration" min="1" optional>
                            </div>
                        
                           
                        
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="post-deadline">Post Deadline</label>
                                <input type="date" name="post_deadline" id="post-deadline" class="form-control" required>
                            </div>
                        
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="start-date">Start Date</label>
                                <input type="date" name="start_date" id="start-date" class="form-control" required>
                            </div>
                    
                        
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="number-of-workers">Number of Workers</label>
                                <input type="number" name="number_of_workers" id="number-of-workers" class="form-control" placeholder="Enter Number of Workers" min="1" required>
                            </div>
                        
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="job-media">Job Media (optional)</label>
                                <input type="file" name="job_media" id="job-media" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                            </div>
                            
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mx-auto ">
                            <button type="submit" class="form-control mx-auto">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
