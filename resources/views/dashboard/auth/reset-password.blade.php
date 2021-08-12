@extends('dashboard.layouts.auth')
@section('title', 'Reset Password')
@section('content')

<div class="card-header login-card-header bg-secondary">
	<p class="h5 text-center mt-1">Reset Password</p>
</div>
<div class="card-body login-card-body">
	<form action="/reset-password" method="post" class="pt-2" autocomplete="off">
		@csrf
		<input type="hidden" name="token" value="{{ $token }}">
		<input type="hidden" name="email" value="{{ $email }}">

		{{-- Password --}}
		<div class="input-group mb-3">
			<input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
				placeholder="New Password" required>
			<div class="input-group-append">
				<div class="input-group-text">
					<span class="fas fa-lock"></span>
				</div>
			</div>
			@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>

		{{-- Confirm --}}
		<div class="input-group mb-3">
			<input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"
				placeholder="Password Confirmation" required>
			<div class="input-group-append">
				<div class="input-group-text">
					<span class="fas fa-lock"></span>
				</div>
			</div>
			@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>

		<div class="row">
			<div class="col-12">
				<button type="submit" class="btn btn-secondary btn-block">Reset Password</button>
			</div>
		</div>
	</form>
</div>
@endsection
