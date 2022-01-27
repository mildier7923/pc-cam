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
				<a href="{{route('products.form')}}" class="btn btn-info">AGREGAR</a>
			</div>
			<div class="card">
				<div class="card-header">
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<thead class="table-dark">
						  <tr>
							<th scope="col">nombre</th>
							<th scope="col">valor</th>
							<th scope="col">descripcion</th>
							<th scope="col">imagen</th>
							<th scope="col">categoria</th>
							<th></th>
						  </tr>
						</thead>
						<tbody>
						  @foreach ($product as $item)
							  <tr>
								  <td>@php
									 echo $item->name;
								  @endphp</td>
								  <td>${{$item->value}}</td>
								  <td>{{$item->description}}</td>
								  <td><img src="{{url('images')."/".$item->image_url}}" style="width:50px; height:50px;"/></td>
								  <td>{{$item->category}}</td>
								  <td>
									<div class="actions w-100 d-flex justify-content-center">
										<a href="{{route('products.edit',$item->id)}}" type="button" class="btn btn-link" title="Editar Usuario"><i class="fas fa-edit"></i>
										</a>
										<button type="button" class="btn btn-link" title="Eliminar Usuario">
											<i class="fas fa-trash"></i>
										</button>
									</div>
								</td>
							  </tr>
						  @endforeach
						</tbody>
					  </table>
				</div>
			</div>
		</section>
	</div>
</section>
@endsection
@section('js')
<script>
	$(document).ready(function () {
		$(".table").DataTable()
	});
</script>
@endsection
