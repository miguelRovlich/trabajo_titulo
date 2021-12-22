@extends('admin.master')

@section('title', 'Agregar Producto')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/products') }}"><i class="fas fa-boxes"></i> Productos</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/product/add') }}"><i class="fas fa-plus"></i> Agregar producto</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-plus"></i> Agregar producto</h2>
		</div>

		<div class="inside">
			{!! Form::open(['url' => '/admin/product/add', 'files' => true]) !!}
			
			<div class="row">

				<div class="col-md-12">
					<label for="name">Nombre del producto:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
					</div>
				</div>
			</div>

			<div class="row mtop16">

				<div class="col-md-6">
					<label for="category">Categoría:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::select('category', $cats, 0, ['class' => 'form-select', 'id' => 'category']) !!}
						{!! Form::hidden('subcategory_actual', 0, ['id' => 'subcategory_actual']) !!}
					</div>
				</div>

				<div class="col-md-6">
					<label for="category">Subcategoría:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
							{!! Form::hidden('subcategory', 0, ['class' => 'form-control']) !!}
							{!! Form::select('subcategory', [], null, ['class' => 'form-select', 'id' => 'subcategory']) !!}
						

					</div>
				</div>

				
			</div>

			<div class="row mtop16">
				<div class="col-md-3">
					<label for="category">Precio Producto:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						
						{!! Form::number('price', null, ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="col-md-3">
					<label for="category">Cantidad Producto</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						
						{!! Form::number('quantity', null, ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="col-md-3">
					<label for="indiscount">¿En Descuento?:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::select('indiscount', ['0' => 'No', '1' => 'Si'], 0, ['class' => 'form-select']) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="discount">Descuento:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::number('discount', 0.00, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="code">Codígo de sistema:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::text('code', 0, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="name">Imagen Destacada:</label>
					<div class="form-file">
					{!! Form::file('img', ['class' => 'form-file-input', 'id' => 'customFile', 'accept' => 'image/*']) !!}
					<label class="form-file-label" for="customFile">
						<span class="form-file-text">Archivo...</span>
						<span class="form-file-button">Buscar</span>
					</label>
					</div>
				</div>

			</div>

			<div class="row mtop16">
				<div class="col-md-12">
					<label for="content">Descripción</label>
					{!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'editor']) !!}
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-12">
					{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
				</div>
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection