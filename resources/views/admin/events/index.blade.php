@extends('admin.layout')

@section('title')
  Dashboard - Event
@endsection

@section('content')
<div class="container-fluid p-2">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title" style="font-size: 30px !important; font-weight: bold;">Event Management</h5>
        </div>
        <div class="card-body">
          @include('admin.partials.flash')
          <a href="{{ url('admin/events/create') }}" class="btn btn-primary float-right mb-3">Add Event</a>
          <table class="table">
            <thead>
              <tr>
                <th style="width:10%;">#</th>
                <th style="width:25%;">Event Name</th>
                <th style="width:20%">Venue</th>
                <th style="width:15%">Date</th>
                <th style="width:15%">Price</th>
                <th style="width:20%">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($events as $event)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $event->event_name }}</td>
                  <td>{{ $event->venue }}</td>
                  <td>{{ date('d M Y', strtotime($event->date)) }}</td>
                  <td>Rp. {{ number_format($event->price) }}</td>
                  <td>
                    <a href="{{ url('admin/events/' . $event->id . '/edit') }}"> <i class="align-middle" data-feather="edit-2"></i></a>
                    <a href="{{ route('admin.events.delete',  $event->id) }}" onclick="return confirm('Are you sure?')"><i class="align-middle" data-feather="trash" style="color: red"></i></a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" style="text-align: center">Tidak ada data</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          {{ $events->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection