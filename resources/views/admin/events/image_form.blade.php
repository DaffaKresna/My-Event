@extends('admin.layout')

@section('content')

<div class="content">
  <div class="row">

    <div class="col-lg-6">
      <div class="card pt-2">
        <div class="card-header">
          <h2>Upload Image</h2>
        </div>
        <div class="card-body">
          @include('admin.partials.flash', ['$errors' => $errors])
          {!! Form::open(['url' => ['admin/events/image', $event->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group">
            {!! Form::label('image', 'Event Image') !!}<br>
            {!! Form::file('image', ['class' => 'form-control-file mt-2']) !!}
          </div>
          <div class="form-footer mt-5">
            <button type="submit" class="btn btn-primary btn-default float-right">Save</button>
            <a href="{{ url('admin/events/' . $eventID . '/images') }}" class="btn btn-secondary btn-default">Back</a>
          </div>
          {!! Form::close() !!}
        </div>
      </div>  
    </div>
    
    <div class="col-lg-2">
        @include('admin.events.menu')
    </div>

  </div>
</div>
@endsection