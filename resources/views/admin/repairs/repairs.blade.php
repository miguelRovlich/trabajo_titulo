@extends('admin.master')

@section('title', 'Reparaciones')

@section('breadcrumb')

<li class="breadcrumb-item">
	<a href="{{ url('/admin/repairs/all') }}"><i class="fas fa-tools"></i> Reparaciones</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title">Agregar Reparacion</h2>
				</div>
				<div class="inside">
					{!! Form::open(['url'=>'admin/repairs/add']) !!}
						
					<label for="">Nombre Equipo</label>
						<div class="input-group">
							<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="far fa-keyboard"></i>
							</span>
							</div>
							{!! Form::text('name', null, ['class'=>'form-control']) !!}	
						</div>
					
						
					<label for="" class="mtop16">Fecha de Ingreso: </label>
						<div class="input-group">
							<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="far fa-calendar"></i>
							</span>
							</div>
							{!! Form::text('name', null, ['class'=>'form-control']) !!}	
						</div>
							
					<label for="" class="mtop16">Fecha de Entrega: </label>
					<div class="input-group">
						<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="far fa-calendar"></i>
						</span>
						</div>
						{!! Form::text('name', null, ['class'=>'form-control']) !!}	
					</div>

					
					<label for="" class="mtop16">Estado: </label>
						<div class="input-group">
							<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="far fa-calendar"></i>
							</span>
							</div>
							{!! Form::text('name', null, ['class'=>'form-control']) !!}	
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection