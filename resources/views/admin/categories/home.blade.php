@extends('admin.master')

@section('title', 'Categorias')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/categories/0') }}"><i class="far fa-folder-open"></i> Categorias</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-plus"></i> Agregar Categoría</h2>
				</div>

				<div class="inside">
					{!! Form::open(['url' => '/admin/category/add/'.$module, 'files' => true]) !!}
					<label for="name">Nombre:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
					</div>

					<label for="module" class="mtop16">Categoría padre:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						<select name="parent" class="form-select">
							<option value="0">Sin Categoría padre</option>
							@foreach($cats as $cat)
							<option value="{{ $cat->id }}">{{ $cat->name }}</option>
							@endforeach
						</select>
					</div>

					<label for="module" class="mtop16">Módulo:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::select('module', getModulesArray(), $module, ['class' => 'form-select', 'disabled']) !!}
					</div>


					<label for="icon" class="mtop16">Ícono:</label>
					<div class="form-file">
					{!! Form::file('icon', ['class' => 'form-file-input', 'required','id' => 'customFile', 'accept' => 'image/*']) !!}
					<label class="form-file-label" for="customFile">
						<span class="form-file-text">Choose file...</span>
						<span class="form-file-button">Browse</span>
					</label>
					</div>

					{!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="far fa-folder-open"></i> Categorias</h2>
				</div>

				<div class="inside">
					<nav class="nav nav-pills nav-fill">
						@foreach(getModulesArray() as $m => $k)
						<a class="nav-link" href="{{ url('/admin/categories/'.$m) }}"><i class="fas fa-list"></i> {{ $k }}</a>
						@endforeach
					</nav>
					<table class="table mtop16">
						<thead>
							<tr>
								<td width="64"></td>
								<td>Nombre</td>
								<td width="160"></td>
							</tr>
						</thead>
						<tbody>
							@foreach($cats as $cat)
							<tr>
								<td>
									@if(!is_null($cat->icon))
									<img src="{{ getUrlFileFromUploads($cat->icon) }}" class="img-fluid">
									@endif
								</td>
								<td>{{ $cat->name }}</td>
								<td>
									<div class="opts">
										<a href="{{ url('/admin/category/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar" class="edit">
											<i class="fas fa-edit"></i>
										</a>

										<a href="{{ url('/admin/category/'.$cat->id.'/subs') }}" data-toggle="tooltip" data-placement="top" title="Subcategorías" class="inventory">
											<i class="fas fa-list-ul"></i>
										</a>
										<a href="{{ url('/admin/category/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted deleted" data-action="delete" data-path="admin/category" data-object="{{ $cat->id }}">
											<i class="fas fa-trash-alt"></i>
										</a>
										
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection