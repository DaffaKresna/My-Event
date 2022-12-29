@extends('admin.layout')

@section('content')
    
  @php
      $formTitle = !empty($event) ? 'Edit' : 'Add Event';
      $formButton = !empty($event) ? 'Edit' : 'Add Event';
  @endphp

  <div class="content">
    <div class="row">

      <div class="col-lg-6">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom">
            <h2>{{ $formTitle }} Event</h2>
          </div>
          <div class="card-body">
            @include('admin.partials.flash', ['$errors' => $errors])
            @if (!empty($event))
              {!! Form::model($event, ['url' => ['admin/events', $event->id], 'method' => 'PUT']) !!}
              @csrf
              {!! Form::hidden('id') !!}
            @else
              {!! Form::open(['url' => 'admin/events']) !!}
              @csrf
            @endif

            <div class="form-group mb-3">
              {!! Form::label('event_name', 'Event Name', ['class' => 'mb-2']) !!}
              {!! Form::text('event_name', null, ['class' => 'form-control form-control-lg']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('venue', 'Venue', ['class' => 'mb-2']) !!}
              {!! Form::text('venue', null, ['class' => 'form-control form-control-lg']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('date', 'Date', ['class' => 'mb-2']) !!}
              {!! Form::date('date', null, ['class' => 'form-control form-control-lg']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('price', 'Price', ['class' => 'mb-2']) !!}
              {!! Form::number('price', null, ['class' => 'form-control form-control-lg']) !!}
            </div>
            
            <div class="form-group mb-3">
              {!! Form::label('detail', 'Detail Event', ['class' => 'mb-2']) !!}
              {!! Form::textarea('detail', null, ['class' => 'form-control form-control-lg']) !!}
            </div>
            
            <div class="form-footer pt-5">
              <button type="submit" class="btn btn-primary btn-default float-end">{{ $formButton }}</button>
              <a href="{{ url('admin/events') }}" class="btn btn-secondary">Back</a>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>

      <div class="col-lg-2">
        
        @if (!empty($event))
          @include('admin.events.menu')
        @endif

      </div>

    </div>
  </div>

@endsection