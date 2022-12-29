@extends('admin.layout')

@section('title')
  Dashboard - Order
@endsection

@section('content')
<div class="container-fluid p-2">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title" style="font-size: 30px !important; font-weight: bold;">Order Management</h5>
        </div>
        <div class="card-body">
          @include('admin.partials.flash')
          <table class="table">
            <thead>
              <tr>
                <th style="width:5%;">#</th>
                <th style="width:15%;">Name</th>
                <th style="width:20%">Email</th>
                <th style="width:20%">Event</th>
                <th style="width:20%">Price</th>
                <th style="width:20%">Code</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($orders as $order)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $order->name }}</td>
                  <td>{{ $order->email }}</td>
                  <td>{{ $order->event->event_name }}</td>
                  <td>Rp. {{ number_format($order->price) }}</td>
                  <td>{{ $order->code }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" style="text-align: center">No Records</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection