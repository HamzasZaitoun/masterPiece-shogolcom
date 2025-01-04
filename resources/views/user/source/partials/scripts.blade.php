<!-- Intro.js JS -->
<script src="https://cdn.jsdelivr.net/npm/intro.js/minified/intro.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
        <!-- JAVASCRIPT FILES -->
<script src="{{asset('assets/user/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/user/js/bootstrap.min.js') }}"></script>
<script src="{{asset('assets/user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/user/js/counter.js')}}"></script>
<script src="{{asset('assets/user/js/custom.js')}}"></script>
<script src="{{asset('assets/user/js/min.js')}}"></script>
@if (session('success') || session('error') || session('info'))
<script>
    function showAlert(type, title, message, redirectUrl = null) {
        Swal.fire({
            icon: type,     // 'success', 'error', 'warning', 'info', or 'question'
            title: title,
            text: message,
            confirmButtonText: 'OK'
        }).then(() => {
            if (redirectUrl) {
                window.location.href = redirectUrl;
            }
        });
    }

    // Show the alert based on session data
    @if (session('success'))
        showAlert('success', 'Success', '{{ session('success') }}');
    @elseif (session('error'))
        showAlert('error', 'Error', '{{ session('error') }}');
    @elseif (session('info'))
        showAlert('info', 'Info', '{{ session('info') }}');
    @endif
</script>
@endif
<script>
    function confirmAction(routeUrl, message = "Are you sure?", confirmText = "Yes, do it!", cancelText = "Cancel", icon = "warning") {
        Swal.fire({
            title: 'Confirm Action',
            text: message,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: confirmText,
            cancelButtonText: cancelText
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = routeUrl;
            }
        });
    }
    </script>