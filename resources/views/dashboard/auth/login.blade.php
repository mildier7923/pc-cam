@extends('dashboard.layouts.auth')
@section('title', 'Login')
@section('content')

<div class="card-header login-card-header bg-secondary">
    <p class="h5 text-center mt-1">Login</p>
</div>
<div class="card-body login-card-body">
    <form action="login" method="post" class="pt-2" autocomplete="off">
        @csrf

        {{-- email --}}
        <div class="input-group mb-3">
            <input type="email" name="email"
                class="form-control @error('credentials') is-invalid @enderror @error('email') is-invalid @enderror"
                placeholder="email" required value="{{ $email ?? old('email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('credentials')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="input-group mb-3">
            <input type="password" name="password"
                class="form-control @error('credentials') is-invalid @enderror @error('password') is-invalid @enderror"
                placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('credentials')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="row">
            <!-- /.col -->
            <div class="col-12">
                <button type="submit" class="btn btn-secondary btn-block">Iniciar Sesion</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
</div>

<div class="login-card-footer">
    <p class="text-center">
        <a href="forgot-password" style="color:#6c757d;">Olvido su contraseña?</a>
    </p>
</div>

@endsection
