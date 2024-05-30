<nav>
  <div class="nav-wrapper indigo darken-4">
    <a href="/" class="brand-logo center">
      <i class="material-icons">school</i>EDMS
    </a>
    <a href="#" data-activates="mobile-demo" class="button-collapse">
      <i class="material-icons">menu</i>
    </a>
    <!-- Mobile View -->
    <ul class="side-nav" id="mobile-demo">
      @if(Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
      @else
        <li><a href="/shared">Shared</a></li>
        <li><a href="/documents">Documents</a></li>
        <li><a href="/mydocuments">My Documents</a></li>
        <li><a href="/categories">Categories</a></li>
        
      
        @endhasanyrole
        <li class="divider"></li>
        <li><a href="/profile">My Account</a></li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
     
    </ul>
    <!-- Desktop View -->
    <ul class="right hide-on-med-and-down">
      <!-- Authentication Links -->
      @if (Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
      @else
        <!-- Dropdown Trigger -->
        <li>
          <a href="" class="datepicker"><i class="material-icons">date_range</i></a>
        </li>
        
        <li>
          <a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}
            <i class="material-icons right">arrow_drop_down</i>
          </a>
        </li>
      @endif
    </ul>
  </div>
</nav>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
   <li>
      <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
          Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
  </li>
</ul>
