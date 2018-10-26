<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     
     <!-- CSRF Token -->
    <meta id="token" name="csrf-token" id="token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->

    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @stack('clear_modal')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
@include('layouts.nav')
    <div class="custom-container">
    <div class="form-group">
    @guest

    @else
    
    
    @endguest
  </div>
        <div class="content" >
            @yield('content')        
        </div>
    </div>
    @if(Session::get('area') == null && !Request::is('/'))
        @include('layouts.change_area_first')
        <script>
            $(function(){
                $('#first_modal').modal({backdrop: 'static', keyboard: false})
            })
        </script>
        @endif
    <footer>
    <nav class="nav flex-column footer-nav">
    @guest
    
    @else
        <a class="nav-link" href="{{ route('home') }}">home</a>
        <a class="nav-link" href="{{ route('cameras.index') }}">cameras</a>
        <a class="nav-link" href="{{ route('images.index')}}">images</a>
    @endguest
    </nav>
        <div class="col-12 text-center">
        © 2018 My Hunting Area, Inc
        </div>
    </footer>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-3oC0DY09X8eGpDuWX4NQZq7pEgeRCVg&callback=initMap">
    </script>
     @stack('scripts')
<script>
   function modal_data(id, title) { 
    var a = document.getElementById("delete-btn");
    a.setAttribute("value", id); 
    
    if(title == 'user_destroy') {
        document.getElementById("title").innerHTML = "Delete user";
        document.getElementById("text").innerHTML = "Are you sure you want to delete user?";
    }
    if(title == 'camera_destroy') {
        document.getElementById("title").innerHTML = "Delete camera";
        document.getElementById("text").innerHTML = "Are you sure you want to delete camera?";
    }
    if(title == 'image_destroy') {
        document.getElementById("title").innerHTML = "Delete image";
        document.getElementById("text").innerHTML = "Are you sure you want to delete image?";
    }
}
</script>
</body>
</html>