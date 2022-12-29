@if ($errors->any())
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-message">
      <strong>Whoops!</strong> Ada masalah dengan masukan Anda,<br><br>
      <ul style="list-style: none;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif

@if (session('success'))
  <div class="alert alert-success alert-outline alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-icon">
      <i class="far fa-fw fa-bell"></i>
    </div>
    <div class="alert-message">
      {{ session('success') }}
    </div>
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-icon">
      <i class="far fa-fw fa-bell"></i>
    </div>
    <div class="alert-message">
      {{ session('error') }}
    </div>
  </div>
@endif