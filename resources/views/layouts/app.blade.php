<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="nav has-shadow">
            <div class="container">
                <div class="navbar-menu">
                    <div class="navbar-start">
                            <a class="navbar-item" href="{{route('home')}}">
                                <img src="{{asset('images/logo.png')}}" alt="Blog Logo">
                            </a>
                            <a href="#" class="navbar-item is-hidden-mobile m-l-10">Learn</a>
                            <a href="#" class="navbar-item is-hidden-mobile">Discuss</a>
                            <a href="#" class="navbar-item is-hidden-mobile">Share</a>
                        </div>
        
                        <div class="navbar-end">
                            @if (!Auth::guest())
                                <a href="#" class="navbar-item">Login</a>
                                <a href="#" class="navbar-item">Join the community</a>
                            @else
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a href="#" class="navbar-link">Hello World</a>
                                    
                                    <div class="navbar-dropdown">
                                        <a href="#" class="navbar-item">Profile</a>
                                        <a href="#" class="navbar-item">Notifications</a>
                                        <a href="#" class="navbar-item">Settings</a>
                                        <hr class="navbar-divider">
                                        <a href="#" class="navbar-item">Logout</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
