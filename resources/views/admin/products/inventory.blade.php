@extends('admin.master')

@section('title', 'Inventario de Producto')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/products/1') }}"><i class="fas fa-boxes"></i> Productos</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/product/1') }}"><i class="fas fa-boxes"></i>{{-- $product['name'] --}}</a>
</li>
<li class="breadcrumb-item">
	<a href="{{-- url('/admin/product/'.$product['id'].'/inventory') --}}"><i class="fas fa-box"></i> Inventario</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<!-- columna #2 -->
		<div class="col-md-12">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-box"></i> Inventarios</h2>
				</div>

				<div class="inside">
					<table class="table">
						<thead>
							<tr>
								<td>ID</td>
								<td>Nombre</td>
								<td>Existencias</td>
								<td>Codigo</td>
								<td>Precio</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							@foreach($product as $inventory)
							<tr>
								<td>
									{{ $inventory->id }}
								</td>
								<td>
									{{ $inventory->name }}
								</td>
								<td>
									{{ $inventory->quantity }}
								</td>
								<td>
									{{ $inventory->code }}
								</td>
								<td>
									{{ $inventory->price }}
								</td>
								<td width="160">
									<div class="opts">
										<a href="#" data-path="admin/product/inventory" data-action="delete" data-object="{{ $inventory->id }}" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted deleted">
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