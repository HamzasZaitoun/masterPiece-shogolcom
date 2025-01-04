<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('assets/login/css/styles.css')}}">
   <title>Shogolcom - Login</title>
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

   <!-- LOGIN CONTAINER -->
   <div class="login container grid">
      <div class="login__access">
         <h1 class="login__title mb-3">welcome back!</h1>
         <div class="login__area">
                <form method="POST" id="loginForm" class="login__form" action="{{ route('login') }}">
                @csrf
               <div class="login__content grid">
                  <div class="login__box">
                     <input type="email" name="email" id="email" required placeholder=" " class="login__input">
                     <label for="email" class="login__label">Email</label>
                     <i class="ri-mail-line login__icon"></i>
                  </div>
                  <div class="login__box">
                     <input type="password"name="password" id="loginPasswordInput" required placeholder=" " class="login__input">
                     <label for="loginPasswordInput" class="login__label">Password</label>
                     <i class="ri-eye-off-fill login__icon" id="loginPasswordToggle"></i>
                  </div>
               </div>
              
               <button type="submit" class="login__button">Login</button>
            </form>
            <p class="login__switch">
               Don't have an account? 
               <a href="{{ route('register') }}" id="loginButtonRegister">Create Account</a>
            </p>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
   <script src="{{asset('assets/login/js/main.js')}}"></script>

</body>
</html>
