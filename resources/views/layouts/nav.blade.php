<nav class="navbar navbar-expand-lg navbar-dark  nav_menu">
<div class="logo">
  	<a  href="{{route('home')}}">My Hunting Area
      <img src="{{asset('img/target.png')}}" alt="">  
    </a>
</div>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
    @guest
    <div class="collapse navbar-collapse" id="navbar1">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
        </ul>
    </div>
    @else
  	<div class="collapse navbar-collapse" id="navbar1">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item">
        		<a class="nav-link header-link" href="{{ route('home') }}">Home</a>
      		</li>
		    <li class="nav-item">
		    	<a class="nav-link header-link" href="{{ route('cameras') }}">Cameras</a>
            </li>
            <li class="nav-item">
		    	<a class="nav-link header-link" href="#">Images</a>
		    </li>
      		
    	</ul>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-item">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="{{asset('img/hunter.png')}}" class="img-fluid user-logo"></img>
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right custom-dropdown" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
      </div>
      @endguest
</nav>    