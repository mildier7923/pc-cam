<!DOCTYPE html>
<html>

<head>
	<title>Dashboard | @yield('title')</title>
	@include('dashboard.layouts._header')
	@yield('head')
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<h1 style="color:#6c757d;" class="mb-4">Dashboard</h1>
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
