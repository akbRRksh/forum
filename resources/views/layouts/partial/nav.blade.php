<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-5" href="/"><img src="{{asset('template/images/Logo_forum.png')}}" class="mr-2" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="/"><img src="{{asset('template/images/Icon_forum.png')}}" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
      {{-- <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block">
          <div class="input-group">
            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              <span class="input-group-text" id="search">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
          </div>
        </li>
      </ul> --}}
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            @auth
            <label>{{Auth::user()->name}}&ensp;</label>
            <i class="bi bi-person"></i>
            @endauth
            @guest
            <label class="btn btn-primary">Login/Register</label>
            @endguest
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            @auth
            <a class="dropdown-item" href="/profile">
              <i class="ti-settings text-primary"></i>
              Profile
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="ti-power-off text-primary"></i>
                {{ __('Logout') }}
            </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
            @endauth
            @guest
            <a class="dropdown-item" href="/login">
              Login
            </a>
            <a class="dropdown-item" href="/register">
              Register
            </a>
            @endguest 
    </div>
  </nav>