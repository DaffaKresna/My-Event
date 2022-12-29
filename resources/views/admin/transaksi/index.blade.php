@extends('admin.layout')

@section('title')
	Dashboard - Pesanan
@endsection

@section('content')
  <div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-default pt-2">
					<div class="card-header card-header-border-bottom">
						<h2>Pesanan</h2>
					</div>
					<div class="card-body">
						@include('admin.partials.flash')
						@include('admin.transaksi.filter')
						<table class="table table-bordered table-stripped mt-3">
							<thead>
								<th>ID Pesanan</th>
								<th>Total</th>
								<th>Nama</th>
								<th>Status</th>
								<th>Status Pembayaran</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								@forelse ($orders as $order)
									<tr>    
										<td>
											{{ $order->kode }}<br>
											<span style="font-size: 12px; font-weight: normal"> {{\General::datetimeFormat($order->tanggal_pemesanan) }}</span>
										</td>
										<td>Rp. {{ number_format($order->total) }}</td>
										<td>
											{{ $order->nama_depan }} {{ $order->nama_belakang }}<br>
											<span style="font-size: 12px; font-weight: normal"> {{ $order->email_pelanggan }}</span>
										</td>
										<td>{{ $order->status }}</td>
										<td>{{ $order->status_pembayaran }}</td>
										<td>
                      <a href="{{ url('admin/transaksi/'. $order->id) }}" class="btn btn-info btn-sm" style="border-radius: 4px">Detail</a>
										</td>
									</tr>
								@empty
									<tr>
										<td colspan="6" align="center">Data tidak ditemukan</td>
									</tr>
								@endforelse
							</tbody>
						</table>
						{{ $orders->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection