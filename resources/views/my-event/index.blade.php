@extends('my-event.layout')

@section('title')
    My Event
@endsection

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To My Event</div>
            <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            <a class="btn btn-warning btn-xl text-uppercase" href="#card-event">Tell Me More</a>
        </div>
    </header>

    <section id="card-event" class="card-event">
        <div class="container">
            <h2 class="text-center fw-bold">Upcoming Events</h2>
            @forelse ($events as $event)
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-2">
                                <h6>{{ $event->event_name }}</h6>
                            </div>
                            <div class="col-3">
                                <a href="{{ url('detail/' . $event->slug) }}" class="btn btn-primary rounded-3 float-end border-0">Rp. {{ number_format($event->price) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card mt-5">
                    <div class="card-body text-center">
                        No Events
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection