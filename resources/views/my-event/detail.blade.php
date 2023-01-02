@extends('my-event.layout')

@section('title')
    My Event - Detail Event
@endsection

@section('content')
    <section class="detail-event">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5>{{ $event->event_name }}</h5>
                            <div class="row">
                                <div class="col-2">
                                    Venue
                                </div>
                                <div class="col">
                                    : {{ $event->venue }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    Date
                                </div>
                                <div class="col">
                                    : {{ date('d M Y', strtotime($event->date)) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    Price
                                </div>
                                <div class="col">
                                    : Rp. {{ number_format($event->price) }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-8">
                                    <p>{{ $event->detail }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col text-center mt-5">
                            <a class="btn btn-primary float-end" style="width: 260px;" data-bs-toggle="modal" data-bs-target="#getTicket">Get Your Ticket!</a>
                        </div>
                    </div>
                </div>
            </div>

            @if (Auth::check())    
            <!-- Modal -->
            <div class="modal fade" id="getTicket" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            Venue: {{ $event->venue }} <br> Date: {{ date('d M Y', strtotime($event->date)) }}
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Your ticket will registered as</p>
                            <p class="text-center">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="modal-footer border-0 d-flex justify-content-center">
                            <button type="button" class="btn btn-primary btn-block" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#payment">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="payment" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            Venue: {{ $event->venue }} <br> Date: {{ date('d M Y', strtotime($event->date)) }}
                        </div>
                        <div class="modal-body">
                            <!-- <p class="text-center">Thank you for your participation</p> -->
                            <p class="text-center">Please transfer ... to the account below</p>
                            <p class="text-center">Bank Mandiri: 0551465542</p>
                            <p class="text-center">A/N: MyEvent</p>
                        </div>
                        <div class="modal-footer border-0 d-flex justify-content-center">
                            <button type="button" class="btn btn-primary btn-block" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#finish">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="finish" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        {!! Form::model($user, ['url' => 'events/checkout']) !!}
                        {!! Form::hidden('id', $event->id) !!}
                        {!! Form::hidden('name', Auth::user()->name) !!}
                        {!! Form::hidden('email', Auth::user()->email) !!}
                        {!! Form::hidden('price', $event->price) !!}
                        <div class="modal-header border-0">
                            Venue: {{ $event->venue }} <br> Date: {{ date('d M Y', strtotime($event->date)) }}
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Thank you for your participation</p>
                        </div>
                        <div class="modal-footer border-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" style="width: 470px;">Finish</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection