{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
   <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('assets/login/css/styles.css')}}">
   <title>Shogolcom</title>
</head>
<body>

   <svg class="login__blob" viewBox="0 0 566 840" xmlns="http://www.w3.org/2000/svg">
      <mask id="mask0" mask-type="alpha">
         <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 
         591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>
      </mask>
   
      <g mask="url(#mask0)">
         <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 
         0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 
         591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 
         167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>
   
         <image class="login__img" href="{{asset('assets/login/img/bg-img.jpg')}}"/>
      </g>
   </svg>

   <!-- LOGIN CONTAINER -->
   <div class="login container grid" id="loginAccessRegister">
      <!-- LOGIN ACCESS -->
      <div class="login__access">
         <h1 class="login__title">Log in to your account.</h1>
         <div class="login__area">
                <form method="POST" id="loginForm" class="login__form" action="{{ route('login') }}">
                @csrf
               <div class="login__content grid">
                  <div class="login__box">
                     <input type="email" name="email" id="email" required placeholder=" " class="login__input">
                     <label for="email" class="login__label">Email
                     </label>
                     <i class="ri-mail-line login__icon"></i>
                  </div>
                  <div class="login__box">
                     <input type="password"name="password" id="loginPasswordInput" required placeholder=" " class="login__input">
                     <label for="loginPasswordInput" class="login__label">Password</label>
                     <i class="ri-eye-off-fill login__icon" id="loginPasswordToggle"></i>
                  </div>
               </div>
               <a href="forgetPassword.php" class="login__forgot">Forgot your password?</a>
               <button type="submit" class="login__button">Login</button>
            </form>
            <p class="login__switch">
               Don't have an account? 
               <button id="loginButtonRegister" type="button">Create Account</button>
            </p>
         </div>
      </div>

      <!-- CREATE ACCOUNT -->
      <div class="login__register">
         <div class="container">
         <h1 class="login__title">Create new account.</h1>
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
         <div class="login__area"> 
            <form method="POST" id="registerForm" class="login__form" action="{{ route('register') }}">
               @csrf
               <div class="login__content grid">
                   <div class="login__group grid">
                       <div class="login__box">
                           <input type="text" id="first_name" name="first_name" required placeholder=" " class="login__input">
                           <label for="first_name" class="login__label">First Name</label>
                           <i class="ri-id-card-fill login__icon"></i>
                       </div>
                       <div class="login__box">
                           <input type="text" id="last_name" name="last_name" required placeholder=" " class="login__input">
                           <label for="last_name" class="login__label">Surname</label>
                           <i class="ri-id-card-fill login__icon"></i>
                       </div>
                   </div>
                   <div class="login__group grid">
                       <div class="login__box">
                           <select id="gender" name="gender" required class="login__input">
                               <option value="" disabled selected>Select Gender</option>
                               <option value="male">Male</option>
                               <option value="female">Female</option>
                           </select>
                           <label for="gender" class="login__label">Gender</label>
                           <i class="ri-men-line login__icon"></i>
                       </div>
           
                       <div class="login__box">
                           <input type="date" id="birth_date" name="birth_date"  placeholder=" " class="login__input">
                           <label for="birth_date" class="login__label">Birth Date</label>
                       </div>
                   </div>
           
                   <div class="login__box">
                       <input type="number" id="mobile_number" name="mobile_number" required placeholder=" " class="login__input">
                       <label for="mobile_number" class="login__label">Mobile number</label>
                       <i class="ri-phone-line login__icon"></i>
                   </div>
                   <div class="login__box">
                       <input type="email" id="email2" name="email" required placeholder=" " class="login__input">
                       <label for="email" class="login__label">Email</label>
                       <i class="ri-mail-line login__icon"></i>
                   </div>
                   <div class="login__group grid">
                    <div class="login__box">
                        <select class="login__input" id="user_governorate" name="user_governorate" required>
                            <option value="" disabled selected>Select Governorate</option>
                            @foreach (\App\Models\Governorate::all() as $governorate)
                                <option value="{{ $governorate->governorate_name }}"
                                    {{ old('user_governorate') == $governorate->governorate_name ? 'selected' : '' }}>
                                    {{ $governorate->governorate_name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="user_governorate" class="login__label">Governorate</label>
                        <i class="ri-government-line login__icon"></i>
                        @error('user_governorate')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="login__box">
                        <select class="login__input" id="user_city" name="user_city" required>
                            <option value="" disabled selected>Select City</option>
                           
                        </select>
                        <label for="user_city" class="login__label">City</label>
                        <i class="ri-building-line login__icon"></i>
                        @error('user_city')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    
                   </div>
                   
                   <div class="login__box">
                       <input type="password" id="password" name="password" required placeholder=" " class="login__input">
                       <label for="password" class="login__label">Password</label>
                       <i class="ri-eye-off-fill login__icon" id="registerPasswordToggle" style="cursor: pointer;"></i>
                   </div>
                   <div class="login__box">
                       <input type="password" name="password_confirmation" id="password_confirmation" required placeholder=" " class="login__input">
                       <label for="password_confirmation" class="login__label">Confirm Password</label>
                       <i class="ri-eye-off-fill login__icon" id="confirmPasswordToggle"></i>
                   </div>
               </div>
               <button type="submit" class="login__button">Create account</button>
           </form>
           
            <p class="login__switch">
               Already have an account? 
               <button id="loginButtonAccess" type="submit">Log In</button>
            </p>
         </div>
         </div>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
   <script src="{{asset('assets/login/js/main.js')}}"></script>


   <script>
    // Add event listener for governorate change
    document.getElementById('user_governorate').addEventListener('change', function() {
        var governorateId = this.value;
        console.log(governorateId); // Log the selected governateId

        if (governorateId) {
            fetch(`/admin/users/cities/${governorateId}`)
                .then(response => response.json())
                .then(cities => {
                    var citySelect = document.getElementById('user_city');
                    citySelect.innerHTML =
                        '<option value="" disabled selected>Select City</option>'; // Reset cities
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
</body>
</html>
