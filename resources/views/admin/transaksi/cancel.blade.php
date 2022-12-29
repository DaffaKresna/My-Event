@extends('admin.layout')

@section('content')
<div class="content">
  <div class="row">
    <div class="col-lg-6">
      <div class="card card-default pt-2 px-1">
        <div class="card-header card-header-border-bottom">
          <h2>Batalkan Pesanan #{{ $order->kode }}</h2>
        </div>
        <div class="card-body">
          @include('admin.partials.flash', ['$errors' => $errors])
          {!! Form::model($order, ['url' => ['admin/transaksi/batalkan', $order->id], 'method' => 'PUT']) !!}
          {!! Form::hidden('id') !!}
          <div class="form-group">
            {!! Form::label('pesan_dibatalkan', 'Pesan Pembatalan', ['class' => 'mb-2']) !!}
            {!! Form::textarea('pesan_dibatalkan', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-footer mt-4">
            <button type="submit" class="btn btn-primary btn-default float-right">Batalkan Pesanan</button>
            <a href="{{ url('admin/transaksi') }}" class="btn btn-secondary btn-default">Kembali</a>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card card-default pt-2">
        <div class="card-header card-header-border-bottom">
          <h2>Detail Pesanan</h2>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xl-6 col-lg-6">
              <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Data Pelanggan</p>
              <address>
                {{ $order->nama_depan }} {{ $order->nama_belakang }}
                <br> Email: {{ $order->email_pelanggan }}
                <br> No. Telepon: {{ $order->no_telepon }}
              </address>
            </div>
            <div class="col-xl-6 col-lg-6">
              <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Detail Pembayaran</p>
              <address>
                ID: <span class="text-dark">#{{ $order->kode }}</span>
                <br> {{ \General::datetimeFormat($order->tanggal_pemesanan) }}
                <br> Status: {{ $order->status }} {{ $order->isCancelled() ? '('. \General::datetimeFormat($order->ditolak_pada) .')' : null}}
                @if ($order->isCancelled())
                  <br> Pesan Pembatalan: {{ $order->pesan_ditolak}}
                @endif
                <br> Status Pembayaran: {{ $order->status_pembayaran }}
              </address>
            </div>
          </div>
          <table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Peralatan</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Lama Penyewaan</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($order->orderItems as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama_peralatan }}</td>
                  <td>{{ $item->jumlah }}</td>
                  <td>Rp. {{ number_format($item->subtotal) }}</td>
                  <td>{{ $order->hari }} Hari</td>
                </tr>
              @empty
                <tr>
                  <td colspan="5">Pesanan tidak ditemukan!</td>
                </tr>
              @endforelse
            </tbody>
          </table>
          <div class="row justify-content-end">
            <div class="col-lg-5 col-xl-6 col-xl-3 ml-sm-auto">
                <ul class="list-unstyled mt-4">
                  <li class="mid pb-3 text-dark">Subtotal
                    <span class="d-inline-block float-right text-default">Rp. {{ number_format($order->subtotal) }}</span>
                  </li>
                  <li class="pb-3 text-dark">Total
                    <span class="d-inline-block float-right">Rp. {{ number_format($order->total) }}</span>
                  </li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection