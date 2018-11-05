<nav class="navbar navbar-expand-lg navbar-dark  nav_menu">
<div class="logo" >
@guest
<span class="area_name" data-toggle="modal" data-target="#exampleModalCenter">My Hunting Area</span>
      <img src="{{asset('img/target.png')}}" alt="">  
@else

  	<span class="area_name open-modal"  data-target="change-area-modal">{{$user_areas->find(session()->get('area'))->name}}</span>
      <img src="{{asset('img/target.png')}}" alt="">  
@endguest
</div>
  
    @guest
    
    @else
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
  	<div class="collapse navbar-collapse" id="navbar1">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item">
        		<a class="nav-link header-link" href="{{ route('home') }}">Startseite</a>
      		</li>
		    <li class="nav-item">
		    	<a class="nav-link header-link" href="{{ route('cameras.index') }}">Kameras</a>
            </li>
            <li class="nav-item">
		    	<a class="nav-link header-link" href="{{ route('images.index')}}">Bilder</a>
		    </li>
      		
    	</ul>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-item">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="{{asset('img/hunter.png')}}" class="img-fluid user-logo"></img>
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right custom-dropdown" aria-labelledby="navbarDropdown">
                @role('admin')<a class="dropdown-item" href="{{ route('settings.index') }}">Einstellungen</a>@endrole
                <a class="dropdown-item" href="{{ route('account.index') }}">Konto</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Abmeldung
                </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
      </div>
      @endguest
</nav>    
