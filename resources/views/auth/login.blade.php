@extends('layouts.app')

@section('content')
	<title>Login Form</title>
	<!-- bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		body {
			background-color: #0A1931;
		}

		.card {
			background-color: C5C6C7;
			margin: 0 auto;
			margin-top: 120px;
			height: 400px;
            width: 800px;

			padding: 20px;
			box-shadow: 5px 5px 5px #888888;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="card">
			<h2 class="card-title text-center mb-5">{{ __('Halaman Login') }}</h2>

			<form method="POST" action="{{ route('login') }}">
				@csrf

				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Masukan Email') }}</label>

					<div class="col-md-6">
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>

				<div class="form-group row">
					<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

					<div class="col-md-6">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-6 offset-md-4">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

							<label class="form-check-label" for="remember">
								{{ __('Ingat Saya') }}
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-8 offset-md-4">
						<button type="submit" class="btn btn-primary">
							{{ __('Masuk') }}
						</button>

						@if (Route::has('password.request'))
							<a class="btn btn-link" href="{{ route('password.request') }}">
								{{ __('Kamu Lupa Kata Sandi?') }}
							</a>
						@endif
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
    @endsection