
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
        <!-- JAVASCRIPT FILES -->
<script src="{{asset('assets/user/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/user/js/bootstrap.min.js') }}"></script>
<script src="{{asset('assets/user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/user/js/counter.js')}}"></script>
<script src="{{asset('assets/user/js/custom.js')}}"></script>
<script src="{{asset('assets/user/js/min.js')}}"></script>
@if (session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Profile Updated!',
        text: 'Your profile has been successfully updated.',
    });
</script>
@endif