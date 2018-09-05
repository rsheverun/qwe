<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="nav nav_menu">
    <div class="logo">
    <a  href="{{route('home')}}">My Hunting Area

        <img src="{{asset('img/target.png')}}" alt="">
    </a>
    </div>
        <a class="nav-link header-link" href="#">Home</a>
        <a class="nav-link header-link" href="#">Cameras</a>
        <a class="nav-link header-link" href="#">Images</a>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{asset('img/hunter.png')}}" class="img-fluid"></img>
 {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
    </nav>
    
    
    <div class="custom-container">
        <div class="content">
            @yield('content')        
        </div>

    </div>        
    <footer>
    <nav class="nav flex-column footer-nav">
        <a class="nav-link" href="#">home</a>
        <a class="nav-link" href="#">cameras</a>
        <a class="nav-link" href="#">images</a>
    </nav>
        <div class="col-12 text-center">
        © 2018 My Hunting Area, Inc
        </div>

    </footer>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>
</body>
</html>