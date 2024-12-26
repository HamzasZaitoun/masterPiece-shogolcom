 
        <!-- End of Sidebar Section -->
    
                <div class="dropdown">
                <div class="profile">
                <div class="info">
                    <p>Hey, <b>{{auth()->user()->first_name}}</b></p>
                    <small class="text-muted">admin</small>
                </div>
                <div class="profile-photo">
                    <img src="{{asset('assets/images/profile-1.jpg')}}">
                </div>
                <ul class="dropdown-menu">
                    <li><a href="{{route('admin.users.adminProfile')}}"><i class="bi bi-person-arms-up"></i>Profile</a></li>
                    <li>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                    
                    
                    
                </ul>
                </div>
                </div>
            </div>

        <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if there's an active link saved in session storage
        const activeLink = sessionStorage.getItem('activeLink');
        if (activeLink) {
            // Apply the active class to the saved link
            document.querySelector(`.sidebar .nav-link[href="${activeLink}"]`)?.classList.add('active');
        }

        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                // Save the clicked link's href in session storage
                sessionStorage.setItem('activeLink', this.getAttribute('href'));

                // Remove active class from all links, then apply to clicked link
                document.querySelectorAll('.sidebar .nav-link').forEach(el => el.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script>
