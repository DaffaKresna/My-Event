<nav id="sidebar" class="sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="/">
      <span class="align-middle">My Event</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-header">
        
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link {{ ($currentAdminMenu == 'orders') ? 'active' : ''}}" href="{{ url('admin/orders') }}">
          <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Order</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link {{ ($currentAdminMenu == 'events') ? 'active' : ''}}" href="{{ url('admin/events') }}">
          <i class="align-middle" data-feather="speaker"></i> <span class="align-middle">Event</span>
        </a>
      </li>
    </ul>
    
  </div>
</nav>