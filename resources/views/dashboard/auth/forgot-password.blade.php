@extends('dashboard.layouts.auth')

@section('title', 'Olvido su contraseña?')

@section('content')

<div class="card-header login-card-header bg-secondary">
	<p class="h5 text-center mt-1">Olvido su contraseña?</p>
</div>
<div class="card-body login-card-body">
	<form action="forgot-password" method="post" class="pt-2" autocomplete="off">
		@csrf

		{{-- email --}}
		<div class="input-group mb-3">
			<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
				placeholder="Correo Electronico" required value="{{ $email ?? old('email') }}">
			<div class="input-group-append">
				<div class="input-group-text">
					<span class="fas fa-user"></span>
				</div>
			</div>
			@error('username')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>

		{{-- Recaptcha --}}
		{{-- <div class="row">
			<div class="col-12">
				{!! htmlFormSnippet() !!}
				@error('g-recaptcha-response')
				<span class="invalid-feedback" role="alert" style="display: block">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div> --}}

		{{-- Buttons --}}
		<div class="row mt-3">
			<div class="col-6">
				<a href="login" class="btn btn-ligth btn-block" style="color:#6c757d;">Cancelar</a>
			</div>
			<div class="col-6">
				<button type="submit" class="btn btn-secondary btn-block">Enviar correo</button>
			</div>
		</div>


	</form>
</div>
@endsection
