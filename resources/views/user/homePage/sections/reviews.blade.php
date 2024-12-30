<section class="reviews-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h2 class="text-center mb-5">What Shogholcom users say</h2>

                <div class="owl-carousel owl-theme reviews-carousel">
                    @foreach($testimonials as $testimonial)
                    <div class="reviews-thumb">
                    
                        <div class="reviews-info d-flex align-items-center">
                            {{-- <img src="images/avatar/portrait-charming-middle-aged-attractive-woman-with-blonde-hair.jpg" class="avatar-image img-fluid" alt=""> --}}

                            <img src="{{ $testimonial->user->profile_picture ? asset('uploads/users/' . $testimonial->user->profile_picture) : asset('assets/user/images/defaults/defaultPFP2.jpg') }}"
                            class=""  alt=""> 

                            <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                <p class="mb-0">
                                    <strong>{{$testimonial->user->first_name . ' '. $testimonial->user->last_name}}</strong>
                                    
                                </p>

                                <div class="reviews-icons">
                                    @for ($i = 1; $i <= $testimonial->rating; $i++)
                                      ⭐
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="reviews-body">
                            <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                            <span class="reviews-title">
                              <strong> 
                                {{
                                    $testimonial->review_text
                                }}  
                              </strong>  
                            </span>
                        </div>
                    </div>
                    @endforeach
                   

                    



                    
                </div>
            </div>

            @auth
           <div class="text-center mt-2">
            <a href="{{route('contact')}}" class="custom-btn btn text-center col-4">add your review!</a>
           </div>
           @endauth
      
        </div>
    </div>
</section>
