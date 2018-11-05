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

    <script src="{{ mix('js/custom.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    @stack('clear_modal')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    <div class="overflow">
        <div id="editArea"></div>

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
    
    <footer>
    <nav class="nav flex-column footer-nav">
    @guest
    
    @else
        <a class="nav-link" href="{{ route('home') }}">Startseite</a>
        <a class="nav-link" href="{{ route('cameras.index') }}">Kameras</a>
        <a class="nav-link" href="{{ route('images.index')}}">Bilder</a>
    @endguest
    </nav>
        <div class="col-12 text-center">
            © 2018 Jagdbezirk.info
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
        document.getElementById("title").innerHTML = "Benutzer löschen";
        document.getElementById("text").innerHTML = "Sind Sie sicher, dass Sie den Benutzer löschen möchten?";
    }
    if(title == 'camera_destroy') {
            document.getElementById("title").innerHTML = "Kamera löschen";
        document.getElementById("text").innerHTML = "Sind Sie sicher, dass Sie die Kamera löschen möchten?";
    }
    if(title == 'image_destroy') {
        document.getElementById("title").innerHTML = "Bild löschen";
        document.getElementById("text").innerHTML = "Sind Sie sicher, dass Sie das Bild löschen möchten?";
    }
}
</script>
</div>
</body>
</html>
