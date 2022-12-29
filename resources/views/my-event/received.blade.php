@extends('my-event.layout')

@section('title')
  My Event - Received
@endsection

@section('content')
  <!-- Received Section -->
  <section id="received" class="received">

    <div class="container">
      <h2>Received</h2>
      <div class="card mt-5">
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-3">
              <h5 style="margin-bottom: -10px;"><strong>Order</strong></h5>
              <br> Name  &nbsp;   &nbsp;   &nbsp;   &nbsp;: {{ $order->name }}
              <br> Email &nbsp;   &nbsp;   &nbsp;   &nbsp;      : {{ $order->email }}
            </div>
    
            <div class="col-3">
              <h5 style="margin-bottom: -10px;"><strong>Detail</strong></h5>
              <br> Invoice ID: <br>{{ $order->code }}
            </div>
          </div>
    
          <div class="row mt-5 mb-3">
            <div class="col-3">
              <h5 style="margin-bottom: -10px;"><strong>Event</strong></h5>
              <br> Event: {{ $order->event->event_name }}
              <br> Event Date: {{ date('d M Y', strtotime($order->event->date)) }}
              <br> Ticket Price: Rp. {{ number_format($order->price) }}
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>
  <!-- End Received Section -->
@endsection