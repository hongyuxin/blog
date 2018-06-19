<nav class="navbar has-shadow">
    <div class="container">
        <div class="navbar-menu">
            <div class="navbar-start">
                    <a class="navbar-item" href="{{route('home')}}">
                        <img src="{{asset('images/logo.png')}}" alt="Blog Logo">
                    </a>
                    <a href="#" class="navbar-item is-tab m-l-10">Learn</a>
                    <a href="#" class="navbar-item is-tab">Discuss</a>
                    <a href="#" class="navbar-item is-tab">Share</a>
                </div>

                <div class="navbar-end">
                    @if (Auth::guest())
                        <a href="{{route('login')}}" class="navbar-item">Login</a>
                        <a href="{{route('register')}}" class="navbar-item">Join the community</a>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a href="#" class="navbar-link">Hey {{Auth::user()->name}}</a>
                            
                            <div class="navbar-dropdown">
                                <a href="#" class="navbar-item">Profile</a>
                                <a href="#" class="navbar-item">Notifications</a>
                                <a href="{{route('manage.dashboard')}}" class="navbar-item">Manage</a>
                                <hr class="navbar-divider">
                                <a href="{{route('logout')}}" class="navbar-item" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
        </div>
    </div>
</nav>