@extends('admin.layout')

@section('content')

  <div class="content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card pt-2">
          <div class="card-header">
            <h2>Event Image</h2>
          </div>
          <div class="card-body">
            @include('admin.partials.flash', ['$errors' => $errors])
            <table class="table">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Uploaded At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($eventImages as $image)
                  <tr>
                    <td><img src="{{ asset('storage/' . $image->path) }}" style="width:100px"/></td>
                    <td>{{ $image->created_at }}</td>
                    <td>
                      {!! Form::open(['url' => 'admin/events/image/'. $image->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                      {!! Form::close() !!}
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" style="text-align: center">No records found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            <a class="btn btn-primary float-end" href="{{ url('admin/events/' . $eventID . '/add-image') }}">Add Image</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        @include('admin.events.menu')
      </div>
    </div>
  </div>

@endsection