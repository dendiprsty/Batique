@extends('layouts.frontend')
@section('title', 'Order Items')
@section('content')
<div class="breadcrumb-area pt-205 breadcrumb-padding pb-50" style="background-color: #C07F00;">
	<div class="container-fluid">
		<div class="breadcrumb-content text-center">
			<h2>
				Pesanan Saya
			</h2>
			<ul>
				<span class="text-light">
					Daftar pesanan yang telah anda buat di {{ config('app.name') }}
				</span>
			</ul>
		</div>
	</div>
</div>
<div class="shop-page-wrapper shop-page-padding ptb-100">

	<div class="container-fluid">

		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="{{ route('orders.index') }}">Pesanan</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link" href="{{ route('profile.index') }}" role="button">Profil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('favorite.index') }}">Favorit</a>
			</li>
		</ul>

		<div class="row">
			<div class="col-lg-12 pt-3">
				<div class="shop-product-wrapper res-xl">
					<div class="table-content table-responsive card border-0">
						<table class="table table-striped shadow-sm p-3">
							<thead>
								<th>Kode Pesanan</th>
								<th>Total Pesanan</th>
								<th>Status Barang</th>
								<th>Pembayaran</th>
								<th>Action</th>
							</thead>
							<tbody>
								@forelse ($orders as $order)
								<tr>
									<td>
										{{ $order->code }}<br>
										<span style="font-size: 12px; font-weight: normal"> {{ $order->order_date }}</span>
									</td>
									<td>{{ number_format($order->grand_total) }}</td>
									<td>
										<!-- Jika -->
										@if ($order->status == "uncompleted")
										<span style="font-size: 12px; font-weight: normal">
											Pesanan telah diterima
										</span>
										@elseif ($order->status == "created")
										<span style="font-size: 12px; font-weight: normal">
											Dikemas
										</span>
										@elseif ($order->status == "delivered")
										<span style="font-size: 12px; font-weight: normal">
											Telah dikirim
										</span>
										@elseif ($order->status == "completed")
										<span style="font-size: 12px; font-weight: normal">
											Diterima
										</span>
										@elseif ($order->status == "failed")
										<span style="font-size: 12px; font-weight: normal">
											Gagal
										</span>
										@elseif ($order->status == "canceled")
										<span style="font-size: 12px; font-weight: normal">
											Dibatalkan
										</span>
										@endif
									</td>
									<td>
										@if ($order->payment_status == "paid")
										<br>
										<span style="font-size: 12px; font-weight: normal">
											Telah dibayar
										</span>
										@else
										<span>
											Belum dibayar
										</span>
										@endif
									</td>
									<td>
										<a href="{{ route('orders.show', $order->id) }}" class="btn btn-secondary rounded btn-sm">Detail</a>
									</td>
								</tr>
								@empty
								<tr>
									<td colspan="5">No records found</td>
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
</div>
@endsection