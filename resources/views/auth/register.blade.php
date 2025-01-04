<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('assets/login/css/styles.css')}}">
   <title>Shogolcom - Register</title>
</head>
<body>

   <svg class="login__blob" viewBox="0 0 566 840" xmlns="http://www.w3.org/2000/svg">
      <mask id="mask0" mask-type="alpha">
         <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>
      </mask>
   
      <g mask="url(#mask0)">
         <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>
   
         <image class="login__img" href="{{asset('assets/login/img/bg-img.jpg')}}"/>
      </g>
   </svg>


   <div class="login container grid ">
      <div class="login__register">
         
            <h1 class="login__title">Create new account.</h1>
        
            <div class="login__area"> 
               <form method="POST" id="registerForm" class="login__form" action="{{ route('register') }}">
                  @csrf
                  <div class="login__content grid">
                      <div class="login__group grid">
                          <div class="login__box">
                              <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required placeholder=" " class="login__input">
                              <label for="first_name" class="login__label">First Name</label>
                              <i class="ri-id-card-fill login__icon"></i>
                          </div>
                          @error('first_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                          <div class="login__box">
                              <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required placeholder=" " class="login__input">
                              <label for="last_name" class="login__label">Surname</label>
                              <i class="ri-id-card-fill login__icon"></i>
                          </div>
                          @error('last_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="login__group grid">
                          <div class="login__box">
                              <select id="gender" name="gender" required class="login__input">
                                  <option value="" disabled selected>Select Gender</option>
                                  <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                  <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                              </select>
                              <label for="gender" class="login__label">Gender</label>
                              <i class="ri-men-line login__icon"></i>
                          </div>
                          @error('gender')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
          
                          <div class="login__box">
                            <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required placeholder=" " class="login__input"
                                   max="{{ date('Y-m-d', strtotime('2004-12-31')) }}" min="{{ date('Y-m-d', strtotime('1970-01-01')) }}">
                            <label for="birth_date" class="login__label">Birth Date</label>
                        </div>
                        @error('birth_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        
                      </div>
          
                      <div class="login__box">
                        <input type="text" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" required placeholder=" " class="login__input" pattern="07\d{8}" title="Mobile number must be exactly 10 digits starting with 07">
                        <label for="mobile_number" class="login__label">Mobile number</label>
                        <i class="ri-phone-line login__icon"></i>
                    </div>
                    @error('mobile_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                    
                      <div class="login__box">
                          <input type="email" id="email2" name="email" value="{{ old('email') }}" required placeholder=" " class="login__input">
                          <label for="email" class="login__label">Email</label>
                          <i class="ri-mail-line login__icon"></i>
                      </div>
                      @error('email')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <div class="login__group grid">
                       <div class="login__box">
                           <select class="login__input" id="user_governorate" name="user_governorate" required>
                               <option value="" disabled selected>Select Governorate</option>
                               @foreach (\App\Models\Governorate::all() as $governorate)
                                   <option value="{{ $governorate->governorate_name }}" {{ old('user_governorate') == $governorate->governorate_name ? 'selected' : '' }}>
                                       {{ $governorate->governorate_name }}
                                   </option>
                               @endforeach
                           </select>
                           <label for="user_governorate" class="login__label">Governorate</label>
                           <i class="ri-government-line login__icon"></i>
                       </div>
                       @error('user_governorate')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                   
                       <div class="login__box">
                           <select class="login__input" id="user_city" name="user_city" required>
                            <option value="" disabled selected>Select City</option>
                            @foreach ($citiesData[old('user_governorate')] ?? [] as $city)
                                <option value="{{ $city }}" {{ old('user_city') == $city ? 'selected' : '' }}>
                                    {{ $city }}
                                </option>
                                   @endforeach
                           </select>
                           <label for="user_city" class="login__label">City</label>
                           <i class="ri-building-line login__icon"></i>
                       </div>
                       @error('user_city')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                      </div>
                      

                      <div class="login__box">
                          <input type="password" id="password" name="password" required placeholder=" " class="login__input">
                          <label for="password" class="login__label">Password</label>
                          <i class="ri-eye-off-fill login__icon" id="registerPasswordToggle" style="cursor: pointer;"></i>
                      </div>
                      @error('password')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <div class="login__box">
                          <input type="password" name="password_confirmation" id="password_confirmation" required placeholder=" " class="login__input">
                          <label for="password_confirmation" class="login__label">Confirm Password</label>
                          <i class="ri-eye-off-fill login__icon" id="confirmPasswordToggle" style="cursor: pointer;"></i>
                      </div>
                      @error('password_confirmation')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                  <button type="submit" class="login__button">Sign Up</button>
              </form>
              <p class="login__switch ">
               Already have an account? 
               <a href="{{ route('login') }}" id="registerButtonLogin">Log In</a>
            </p>
         </div>
      </div>
   </div>
   <script>
    // Add event listener for governorate change
    document.getElementById('user_governorate').addEventListener('change', function() {
        var governorateId = this.value;
        console.log(governorateId); // Log the selected governateId

        if (governorateId) {
            fetch(`cities/${governorateId}`)
    .then(response => response.json())
    .then(cities => {
        console.log(cities); // Log the cities array to check if it's correct
        var citySelect = document.getElementById('user_city');
        citySelect.innerHTML = '<option value="" disabled selected>Select City</option>'; // Reset cities
        cities.forEach(city => {
            var option = document.createElement('option');
            option.value = city;
            option.textContent = city;
            citySelect.appendChild(option);
        });
    });
        } else {
            document.getElementById('user_city').innerHTML =
                '<option value="" disabled selected>Select City</option>';
        }
    });
</script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
   <script src="{{asset('assets/login/js/main.js')}}"></script>

</body>
</html>
