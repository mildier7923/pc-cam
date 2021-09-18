<!DOCTYPE html>
<html>

<head>
	<title>PC-CAM | @yield('title')</title>
	@include('dashboard.layouts._header')
	@yield('head')
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo d-flex justify-content-center">
			<div class="mr-4">
				<img src="{{asset('img/logos/big-logo.png')}}" alt="Logo" width="60">
			</div>
			<h1 style="color:#6c757d;" class="mb-4">PC-CAM</h1>
		</div>

		@include('dashboard.layouts._alert')

		<div class="card">
			@yield('content')
		</div>
	</div>

	@include('dashboard.layouts._scripts')
	@yield('js')

</body>

</html>
