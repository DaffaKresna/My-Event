@extends('admin.layout')

@section('title')
  Dashboard
@endsection

@section('content')
<div class="container-fluid p-2">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title" style="font-size: 30px !important; font-weight: bold;">Daftar Pengguna Travel Alam</h5>
        </div>
        <div class="card-body">
          @include('admin.partials.flash')
          <table class="table">
            <thead>
              <tr>
                <th style="width:15%;">#</th>
                <th style="width:35%;">Nama Pengguna</th>
                <th style="width:30%">Email</th>
                <th style="width:30%">No. Telepon</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $user->nama_depan }} {{ $user->nama_belakang }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->no_telepon }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" style="text-align: center">Tidak ada data</td>
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