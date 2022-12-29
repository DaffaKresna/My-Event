<div class="card pt-2">
  <div class="card-header">
    <h2>Menu</h2>
  </div>
  <div class="card-body">
    <nav class="nav flex-column">
      <a class="nav-link" href="{{ url('admin/events/'. $eventID .'/edit') }}">Edit Event</a>
      <a class="nav-link" href="{{ url('admin/events/'. $eventID .'/images') }}">Event Image</a>
    </nav>
  </div>
</div>