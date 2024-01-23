@extends('layouts.frontend')
@section('title', 'User Profile')
@section('content')
<div class="breadcrumb-area pt-205 breadcrumb-padding pb-50" style="background-color: #C07F00;">
	<div class="container-fluid">
		<div class="breadcrumb-content text-center">
			<h2>
				Profil Saya
			</h2>
			<ul>
				<li>
					Lengkapi data diri anda untuk mempermudah proses transaksi
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="shop-page-wrapper shop-page-padding ptb-100">
	<div class="container-fluid">
		@if(session()->has('message'))
		<div class="alert alert-success">
			{{ session()->get('message') }}
		</div>
		@endif

		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" aria-current="page" href="{{ route('orders.index') }}">Pesanan</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link active" href="{{ route('profile.index') }}" role="button">Profil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('favorite.index') }}">Favorit</a>
			</li>
		</ul>

		<div class="row">
			<div class="col-lg-12 mt-3">
				<div class="login">
					<div class="login-form-container rounded">
						<div class="login-form">
							<form action="{{ route('profile.update') }}" method="post">
								@csrf
								@method('put')
								<div class="form-group row">
									<div class="col-md-12">
										<label for="username">
											Nama Pengguna
										</label>
										<input type="text" name="username" value="{{ auth()->user()->username }}">
										@error('username')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label for="first_name">
											Nama Depan
										</label>
										<input type="text" name="first_name" value="{{ auth()->user()->first_name }}">
										@error('first_name')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="col-md-6">
										<label for="last_name">
											Nama Belakang
										</label>
										<input type="text" name="last_name" value="{{ auth()->user()->last_name }}">
										@error('last_name')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label for="address1">
											Alamat Lengkap
										</label>
										<textarea name="address1" rows="5">{{ auth()->user()->address1 }}</textarea>
										@error('address1')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label for="address2">
											Detail Alamat
										</label>
										<textarea name="address2" rows="5">{{ auth()->user()->address2 }}</textarea>
										@error('address2')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-6">
										<label>
											Provinsi<span class="required">*</span></label>
										<select name="province_id" id="province-id" value="{{ auth()->user()->province_id }}">
											<option value="">- Silahkan Pilih -</option>
											@foreach($provinces as $province => $pro)
											<option {{ auth()->user()->province_id == $province ? 'selected' : null }} value="{{ $province }}">{{ $pro }}</option>
											@endforeach
										</select>
										@error('province_id')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="col-md-6">
										<label>Kota<span class="required">*</span></label>
										<select name="city_id" id="city-id" value="{{ auth()->user()->city_id }}">
											@foreach($cities as $city => $ty)
											<option {{ auth()->user()->city_id == $city ? 'selected' : null }} value="{{ $city }}">{{ $ty }}</option>
											@endforeach
										</select>
										@error('city_id')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-6">
										<label>Kode POS / Zip <span class="required">*</span></label>
										<input type="number" name="postcode" placeholder="PostalCode..." value="{{ auth()->user()->postcode }}">
										@error('postcode')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="col-md-6">
										<label>No. Telepon <span class="required">*</span></label>
										<input type="number" name="phone" placeholder="Phone..." value="{{ auth()->user()->phone }}">
										@error('phone')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label>Email </label>
										<input type="text" name="email" placeholder="Email..." value="{{ auth()->user()->email}}">
										@error('email')
										<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
								</div>
								<div class="button-box">
									<button type="submit" class="default-btn floatright" style="background-color: #C07F00; color: #fff; border:none;">
										Perbarui Profile</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- register-area end -->
@endsection