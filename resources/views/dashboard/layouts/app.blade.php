<!DOCTYPE html>
<html>

<head>
	<title>PC-CAM | @yield('title')</title>
	@include('dashboard.layouts._header')
	@yield('head')
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-closed sidebar-collapse">
	<div class="wrapper b-color">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			@include('dashboard.layouts._navbar')
		</nav>

		<!-- Main Sidebar Container (Menu) -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			@include('dashboard.layouts._menu')
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper b-color">
			<div class="content mt-3 b-color w-100">
				@include('dashboard.layouts._alert')
			</div>
			@yield('content')
		</div>


		<!-- Footer -->
		<footer class="main-footer ">
			@include('dashboard.layouts._footer')
		</footer>

	</div>

	{{-- Scripts --}}
	@include('dashboard.layouts._scripts')
	@yield('js')
</body>

</html>
