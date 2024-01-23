@extends('layouts.frontend')
@section('title', 'Favorite Items')
@section('content')
<div class="breadcrumb-area pt-205 breadcrumb-padding pb-50" style="background-color: #C07F00;">
	<div class="container-fluid">
		<div class="breadcrumb-content text-center">
			<h2>
				Produk Favorit
			</h2>
			<ul>
				<li>
					Lihat produk favorit anda
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="shop-page-wrapper shop-page-padding ptb-100">
	<div class="container-fluid">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" aria-current="page" href="{{ route('orders.index') }}">Pesanan</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link" href="{{ route('profile.index') }}" role="button">Profil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="{{ route('favorite.index') }}">Favorit</a>
			</li>
		</ul>
		<div class="row mt-3">
			<div class="col-lg-12">
				<div class="shop-product-wrapper res-xl card rounded">
					<div class="table-content table-responsive">
						<table>
							<thead>
								<tr>
									<th>Hapus</th>
									<th>Gambar Produk</th>
									<th>Nama Produk</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($favorites as $favorite)
								@php
								$product = $favorite->product;
								@endphp
								<tr>
									<td class="product-remove">
										<form id="delete-fav" action="{{ route('favorite.destroy', $favorite->id)}}" method="POST" class="d-none">
											@csrf
											@method('delete')
										</form>
										<a href="" onclick="event.preventDefault();document.getElementById('delete-fav').submit();" class="delete"><i class="pe-7s-close"></i></a>
									</td>
									<td class="product-thumbnail">
										<a href="{{ route('product.show', $product->slug) }}">
											@if($product->firstMedia)
											<img src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}" width="60" height="60" alt="{{ $product->name }}">
											@else
											<span class="badge badge-danger">no image</span>
											@endif
										</a>
									</td>
									<td class="product-name"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></td>
									<td class="product-price-cart"><span class="amount">{{ number_format($product->price) }}</span></td>
								</tr>
								@empty
								<tr>
									<td colspan="4">You have no favorite product</td>
								</tr>
								@endforelse
							</tbody>
						</table>
						{{ $favorites->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection