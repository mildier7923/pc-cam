<!-- Logo -->
<a href="{{route('home')}}" class="brand-link">
	<img src="{{asset('img/logos/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"
		width="35">
	<span class="brand-text font-weight-light font-weight-bold">PC-CAM</span>
</a>

<!-- Menu -->
<div class="sidebar">
	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

			{{-- Dashboard --}}
			<li class="nav-item">
				<a href="{{route('home')}}" class="nav-link">
					<i class="nav-icon fas fa-chart-line"></i>
					<p>
						Inicio
					</p>
				</a>
			</li>

			{{-- Contacts --}}
			<li class="nav-item has-treeview">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-address-book"></i>
					<p>
						Contactos
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>

				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{route('contact')}}" class="nav-link">
							<i class="nav-icon fas fa-circle"></i>
							{{-- <i class="far fa-circle nav-icon"></i> --}}
							<p> Nuevos</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('contact.interview')}}" class="nav-link">
							<i class="nav-icon fas fa-circle"></i>
							{{-- <i class="far fa-circle nav-icon"></i> --}}
							<p> Entrevistados</p>
						</a>
					</li>
				</ul>
			</li>

			{{-- Users --}}
			@role('admin')
			<li class="nav-item">
				<a href="{{route('user')}}" class="nav-link">
					<i class="nav-icon fas fa-users"></i>
					<p>
						Usuarios
					</p>
				</a>
			</li>
			@endrole
		</ul>
	</nav>
</div>
