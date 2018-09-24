<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta property="og:title" content="Linkedin Share button using Plugins – HTML" />
<meta property="og:description" content="In this video I have shown how to create the LinkedIn share button in Webpages." />
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:image" content="http://example.com/foo.jpg" />
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
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
</head>
<body>
@include('layouts.nav')
    <div class="custom-container">
        <div class="content">
            @yield('content')        
        </div>

    </div>
    
    <footer>
    <nav class="nav flex-column footer-nav">
    @guest
    
    @else
        <a class="nav-link" href="{{ route('home') }}">home</a>
        <a class="nav-link" href="{{ route('cameras.index') }}">cameras</a>
        <a class="nav-link" href="{{ route('images')}}">images</a>
    @endguest
    </nav>
        <div class="col-12 text-center">
        © 2018 My Hunting Area, Inc
        </div>

    </footer>

  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTnAHK7-nViSyxtzqwxQvgcDfq5WOzPkU&callback=initMap">
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
</body>
</html>