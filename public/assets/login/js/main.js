//       // Toggle password visibility function
//       const togglePasswordVisibility = (inputId, iconId) => {
//          const input = document.getElementById(inputId);
//          const icon = document.getElementById(iconId);

//          icon.addEventListener('click', () => {
//             if (input.type === 'password') {
//                input.type = 'text';
//                icon.classList.remove('ri-eye-off-fill');
//                icon.classList.add('ri-eye-fill');
//             } else {
//                input.type = 'password';
//                icon.classList.remove('ri-eye-fill');
//                icon.classList.add('ri-eye-off-fill');
//             }
//          });
//       };

// // Initialize toggle functionality for login and register fields
// togglePasswordVisibility('loginPasswordInput', 'loginPasswordToggle');
// togglePasswordVisibility('registerPassword', 'registerPasswordToggle');
// togglePasswordVisibility('confirmPassword', 'confirmPasswordToggle');

// // Login form submission with redirect to index.php
// // document.getElementById("loginForm").addEventListener("submit", (event) => {
// //    event.preventDefault();
// //    window.location.href = "{{ route('login') }}";
// // });


// // Register form submission with password match validation and redirect
// // document.getElementById("registerForm").addEventListener("submit", (event) => {
// //    event.preventDefault();
// //    const password = document.getElementById("registerPassword").value;
// //    const confirmPassword = document.getElementById("confirmPassword").value;
// //    if (password === confirmPassword) {
// //       Swal.fire({
// //          title: "Account created successfully.",
// //          text: "",
// //          icon: "success",
// //              });
// //       window.location.href = "login.php"; 
// //    } else {
// //       Swal.fire({
// //          title: "Passwords do not match.",
// //          text: "Please try again.",
// //          icon: "error",
// //              });
// //    }
// // });

// // Toggle between login and register forms
// const loginAccessRegister = document.getElementById('loginAccessRegister');
// const buttonRegister = document.getElementById('loginButtonRegister');
// const buttonAccess = document.getElementById('loginButtonAccess');

// // buttonRegister.addEventListener('click', () => {
// //    loginAccessRegister.classList.add('active');
// // });

// // buttonAccess.addEventListener('click', () => {
// //    loginAccessRegister.classList.remove('active');
// // });
// // window.addEventListener('load', function () {
// //    document.body.classList.add('loaded');
// // });
// Example of adding animation class after page load
window.onload = () => {
    const loginArea = document.querySelector('.login__area');
    loginArea.classList.add('slideIn');
 };
 