@extends('user.source.template')
@section('content')
<main>

    <header class="site-header">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 col-12 text-center">
                    <h1 class="text-white">Get in touch</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </header>


    <section class="contact-section section-padding">
        <div class="container">
            <div class="row justify-content-center">

               
                @if ($errors->all())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <div class="col-lg-8 col-12 mx-auto">
                    <form class="custom-form contact-form" action="{{route('contact.store')}}" method="post" role="form">
                        @csrf
                        <h2 class="text-center mb-4">Contact us!</h2>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="full-name">Full Name</label>
                            
                                @auth
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> 
                                    <input type="text" id="full-name" class="form-control" value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}" disabled>
                                @else
                                    <!-- If the user is a guest -->
                                    <input type="text" name="full_name" id="full-name" class="form-control mb-2" placeholder="full name" required>
                                @endauth
                            </div>
                            

                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="email">Email Address</label>
                            
                                @auth
                                    <!-- If the user is logged in, prefill the email address -->
                                    <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" required>
                                @else
                                    <!-- If the user is a guest, show an empty email field -->
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Jackdoe@gmail.com" required>
                                @endauth
                            </div>
                            
                            <div class="form-group">
                                <label for="category">Why do you contact us?</label>
                                <select name="category" id="category" class="form-control form-select" required>
                                    <option value="" disabled selected>why do you contact us?</option>
                                    <option value="Technical Issue">Technical Issue</option>
                                    <option value="Feedback">Feedback</option>
                                    <option value="General Inquiry">General</option>
                                    @auth
                                    <option value="Review" selected>Review</option>
                                    @endauth
                                </select>
                            </div>
                            @auth
                            <div id="review-section" style="display: block; margin-top: 20px;">
                                <label for="rating">Please rate us:</label>
                                <div id="stars" class="star-rating">
                                    <span class="star" data-value="1">&#9734;</span>
                                    <span class="star" data-value="2">&#9734;</span>
                                    <span class="star" data-value="3">&#9734;</span>
                                    <span class="star" data-value="4">&#9734;</span>
                                    <span class="star" data-value="5">&#9734;</span>
                                </div>
                                <input type="hidden" name="rating" id="rating" value="0">
                            </div>
                            @endauth
                            <div class="col-lg-12 col-12">
                                <label for="message">Message</label>

                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="What can we help you?" required></textarea>
                            </div>

                            <div class="col-lg-4 col-md-4 col-6 mx-auto">
                                <button type="submit" class="form-control">Send Message</button>
                            </div>
                        </div>
                    </form>
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
<script>
    document.getElementById('category').addEventListener('change', function() {
        const reviewSection = document.getElementById('review-section');
        if (this.value === 'Review') {
            reviewSection.style.display = 'block';
        } else {
            reviewSection.style.display = 'none';
            document.getElementById('rating').value = 0; // Reset rating when not in review mode
        }
    });

    // Handle star rating
    const stars = document.querySelectorAll('.star');
    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-value');
            document.getElementById('rating').value = rating;

            // Reset all stars and highlight the selected ones
            stars.forEach(s => s.innerHTML = '&#9734;'); // Empty star
            for (let i = 0; i < rating; i++) {
                stars[i].innerHTML = '&#9733;'; // Filled star
            }
        });
    });
</script>
@endsection