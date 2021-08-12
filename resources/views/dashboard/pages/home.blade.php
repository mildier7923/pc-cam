@extends('dashboard.layouts.app')

@section('title', 'Inicio')

@section('head')
@endsection

@section('content')

<div class="content b-color">
	<div class="container-fluid row">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark h2">Hola {{Auth::user()->name}}</h1>
		</div>
		<div class="col-sm-6">
			<ol class="float-sm-right">
				<li class="active"><a href="{{route('home')}}"> Inicio </a></li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section('js')
@endsection
