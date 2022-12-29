@extends('admin.layout')

@section('content')
<div class="content">
	<div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
		<div class="d-flex justify-content-between">
			<h2 class="text-dark font-weight-medium">ID Pesanan #{{ $order->kode }}</h2>
		</div>
		<div class="row pt-5">
			<div class="col-xl-4 col-lg-4">
				<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Data Pelanggan</p>
				<address>
					{{ $order->nama_depan }} {{ $order->nama_belakang }}
					<br> Email: {{ $order->email_pelanggan }}
					<br> No. Telepon: {{ $order->no_telepon }}
				</address>
			</div>
			<div class="col-xl-4 col-lg-4">
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
			<div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
				<ul class="list-unstyled mt-4">
					<li class="mid pb-3 text-dark">Subtotal
						<span class="d-inline-block float-right text-default">Rp. {{ number_format($order->subtotal) }}</span>
					</li>
					<li class="pb-3 text-dark">Total
						<span class="d-inline-block float-right">Rp. {{ number_format($order->total) }}</span>
					</li>
				</ul>
				@if (in_array($order->status, [\App\Models\Order::CREATED, \App\Models\Order::CONFIRMED]))
					<a href="{{ url('admin/transaksi/'. $order->id .'/batalkan')}}" class="btn btn-block mt-2 btn-lg btn-warning btn-pill"> Batalkan</a>
				@endif

				@if ($order->isConfirmed())
					<a href="#" class="btn btn-block mt-2 btn-lg btn-success btn-pill" onclick="event.preventDefault();
					document.getElementById('complete-form-{{ $order->id }}').submit();"> Tandai sebagai Selesai</a>

					{!! Form::open(['url' => 'admin/transaksi/selesai/'. $order->id, 'id' => 'complete-form-'. $order->id, 'style' => 'display:none']) !!}
					{!! Form::close() !!}
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
