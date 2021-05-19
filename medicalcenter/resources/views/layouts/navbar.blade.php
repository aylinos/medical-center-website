<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="{{ route('welcome')}}">Healthlab</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <!-- Left side -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('welcome')}}">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Specialists
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#">Dermatologists</a>
          <a class="dropdown-item" href="#">Urologists</a>
          <a class="dropdown-item" href="#">Cardiologists</a>
          <a class="dropdown-item" href="{{ url('/orthodontists') }}">Orthodontists</a>
        </div>
      </li>
    </ul>
    <!-- Right side -->
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <!-- Authentication Links -->
      @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          @if (Route::has('register'))
              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
          @endif
      @else
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light"><i class="fab fa-twitter"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light"><i class="fab fa-google-plus-g"></i></a>
      </li>
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->first_name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @if ( Auth::user()->role_id  == 2)
                  <a class="dropdown-item" href="{{ route('doctor.profile') }}">My profile</a>
                    @endif
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
          @if ( Auth::user()->role_id  == 1)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard')}}">Administration</a>
          </li>
          @endif
      @endguest

    </ul>
  </div>
</nav>
<!--/.Navbar -->
