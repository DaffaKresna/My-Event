<nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle d-flex">
    <i class="hamburger align-self-center"></i>
  </a>
  
  <div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
          <span class="text-dark">Halo, {{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>