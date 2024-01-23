@extends('layouts.frontend')
@section('title', 'Order Detail')
@section('content')
<!-- header end -->
<div class="breadcrumb-area pt-205 breadcrumb-padding pb-50" style="background-color: #C07F00;">
	<div class="container">
		<div class="breadcrumb-content text-center">
			<h2>
				Pesanan Anda
			</h2>
			<ul>
				<li>Halaman ini berisi detail pesanan Anda.</li>
			</ul>
		</div>
	</div>
</div>
<!-- checkout-area start -->
<div class="cart-main-area  ptb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="cart-heading">
					Detail Pesanan
					</h4>
					<div class="row">
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">
								Data Pelanggan
							</p>
							<address>
								<table class="table">
									<tr>
										<td>Nama</td>
										<td>:</td>
										<td>{{ $order->customer_first_name }} {{ $order->customer_last_name }}</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>:</td>
										<td>{{ $order->customer_email }}</td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>:</td>
										<td>{{ $order->customer_phone }}</td>
									</tr>
								</table>
							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">
								Data Pengiriman
							</p>
							<address>

								<table class="table">
									<tr>
										<td>Pemesan</td>
										<td>:</td>
										<td>{{ $order->customer_first_name }} {{ $order->customer_last_name }}</td>
									</tr>
									<tr>
										<td>Alamat Pengiriman</td>
										<td>:</td>
										<td>{{ $order->shipment->address2 }} - {{ $order->shipment->address1 }}</td>
									</tr>
									<tr>
										<td>Service</td>
										<td>:</td>
										<td>{{ $order->shipping_service_name }}</td>
									</tr>
									<tr>
										<td>Cost</td>
										<td>:</td>
										<td>Rp.{{ number_format($order->shipping_cost) }}</td>
									</tr>
									<!-- Email, Phone, Postcode -->
									<tr>
										<td>Email</td>
										<td>:</td>
										<td>{{ $order->shipment->email }}</td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>:</td>
										<td>{{ $order->shipment->phone }}</td>
									</tr>
									<tr>
										<td>Postcode</td>
										<td>:</td>
										<td>{{ $order->shipment->postcode }}</td>
									</tr>
								</table>
							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2 ms-4" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Detail Produk Pesanan</p>
							<address>

								<table class="table">
									<tr>
										<td>Kode Pesanan</td>
										<td>:</td>
										<td>{{ $order->code }}</td>
									</tr>
									<tr>
										<td>Tanggal Pesan</td>
										<td>:</td>
										<td>{{ date('d M Y H:i:s', strtotime($order->order_date)) }}</td>
									</tr>
									<tr>
										<td>Status</td>
										<td>:</td>
										<td>{{ $order->status }}</td>
									</tr>
									<tr>
										<td>Payment Status</td>
										<td>:</td>
										<td>{{ $order->payment_status }}</td>
									</tr>
									<tr>
										<td>Payment Method</td>
										<td>:</td>
										<td>{{ $order->payment_method }}</td>
									</tr>
									<tr>
										<td>Shipping Service</td>
										<td>:</td>
										<td>{{ $order->shipping_service_name }}</td>
									</tr>
								</table>
							</address>
						</div>
					</div>
					<div class="table-content table-responsive">
						<table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Code</th>
									<th>product name</th>
									<th>Quantity</th>
									<th>Unit Cost</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($order->orderItems as $item)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $item->weight }} (gram)</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->qty }}</td>
									<td>Rp.{{ number_format($item->base_price) }}</td>
									<td>Rp.{{ number_format($item->sub_total) }}</td>
								</tr>
								@empty
								<tr>
									<td colspan="6">Order item not found!</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-5 ml-auto">
							<div class="cart-page-total">
								<ul>
									<li> Subtotal
										<span>Rp.{{ number_format($order->base_total_price) }}</span>
									</li>
									<li>Tax (10%)
										<span>Rp.{{ number_format($order->tax_amount) }}</span>
									</li>
									<li>Shipping Cost
										<span>Rp.{{ number_format($order->shipping_cost) }}</span>
									</li>
									<li>Total
										<span>Rp.{{ number_format($order->grand_total) }}</span>
									</li>
								</ul>
								@if (!$order->isPaid())
								<a href="{{ $order->payment_url }}">Proceed to payment</a>
								@endif
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection