@extends('dashboard.layouts.app')

@section('title', 'Productos')

@section('head')
@endsection

@section('content')

<div class="content b-color">
	<div class="container-fluid row">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark h2">Productos</h1>
		</div>
		<div class="col-sm-6">
			<ol class="float-sm-right breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('home')}}"> Inicio </a></li>
				<li class="breadcrumb-item active"> Productos </li>
			</ol>
		</div>
	</div>
</div>

<!-- Main content -->
<section class="content b-color">
	<div class="container-fluid row">
		<section class="col-md-12">
			<div class="justify-content-center">
				<div id="app">
				</div>
			</div>
		</section>
	</div>
</section>
@endsection

@section('js')
@endsection
