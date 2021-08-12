<ul class="navbar-nav">
	<li class="nav-item">
		<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
	</li>
</ul>

{{-- Navbar Right Menu --}}
<div class="navbar navbar-nav ml-auto p-0 py-1">
	<ul class="nav navbar-nav p-0">
		<li class="dropdown user-menu">
			<a href="" data-toggle="dropdown" class="d-flex align-items-center"
				style="text-decoration: none; color: rgba(0,0,0,.5);">
				<span class="mr-2">{{Auth::user()->name}}</span>
				<i class=" fas fa-user-circle fa-2x"></i>
			</a>
			<ul class="dropdown-menu">
				<li class="user-header" style="color: rgba(0,0,0,.5); height:130px;">
					<i class=" fas fa-user-circle fa-5x"></i>
					<p>
						{{Auth::user()->email}}
					</p>
				</li>
				<li class="user-body">
					<div class="row">
						<div class="col-12">
							<form id="logout-form" action="/logout" method="POST">
								@csrf
								<input type="submit" value="Logout" class="btn btn-secondary btn-block">
							</form>
						</div>
					</div>
				</li>
			</ul>
		</li>
	</ul>
</div>
