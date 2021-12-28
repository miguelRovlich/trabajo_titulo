@extends('admin.master')

@section('title', 'Editar Usuario')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users') }}"><i class="fas fa-user-friends"></i> Usuarios</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="page_user">
		<div class="row">

			<div class="col-md-4">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fas fa-user"></i> Información</h2>
					</div>

					<div class="inside">
						<div class="mini_profile">
							@if(is_null($u->avatar))
							<img src="{{ url('/static/images/default-avatar.png') }}" class="avatar">
							@else
							<img src="{{ url('/uploads_users/'.$u->id.'/'.$u->avatar) }}" class="avatar">
							@endif
							<div class="info">
								<span class="title"><i class="far fa-address-card"></i> Nombre:</span>
								<span class="text">{{ $u->name }} {{ $u->lastname }}</span>
								<span class="title"><i class="fas fa-user-tie"></i> Estado del usuario:</span>
								<span class="text">{{ getUserStatusArray(null,$u->status) }}</span>
								<span class="title"><i class="far fa-envelope"></i> Correo electrónico:</span>
								<span class="text">{{ $u->email }}</span>
								<span class="title"><i class="far fa-calendar-alt"></i> Fecha de registro:</span>
								<span class="text">{{ $u->created_at }}</span>
								<span class="title"><i class="fas fa-user-shield"></i> Role de usuario:</span>
								<span class="text">{{ getRoleUserArray(null,$u->role) }}</span>
							</div>
								@if($u->status == "100")
								<a href="{{ url('/admin/user/'.$u->id.'/banned') }}" class="btn btn-success">Activar usuario</a>
								@else
								<a href="{{ url('/admin/user/'.$u->id.'/banned') }}" class="btn btn-danger">Suspender Usuario</a>
								@endif
						
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-8">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fas fa-clipboard-list"></i> Historial de compras</h2>
					</div>

					<div class="inside">
						<table class="table mtop16">
							<thead>
								<tr>
									<td><strong>#</strong></td>
									<td><strong>Estado</strong></td>
									<td><strong>Tipo</strong></td>
									<td><strong>Fecha</strong></td>
									<td><strong>Total</strong></td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								@foreach($u->getOrders as $order)
								<tr>
									<td>
										{{ $order->o_number }}
									</td>
									<td>{{ getOrderStatus($order->status) }}</td>
									<td>{{ getOrderType($order->o_type) }}</td>
									<td>{{ $order->request_at }}</td>
									<td>{{ number($order->total) }}</td>
									<td>
										@if(kvfj(Auth::user()->permissions, 'order_view'))
										<a href="{{ url('/admin/order/'.$order->id.'/view') }}" class="btn btn-primary btn-sm">Abrir</a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div class="panel shadow mtop16">
					<div class="header">
						<h2 class="title"><i class="fas fa-user-edit"></i> Editar Información</h2>
					</div>

					<div class="inside">
						{!! Form::open(['url' => '/admin/user/'.$u->id.'/edit']) !!}
							<div class="row">

								<div class="col-md-6">
									<label for="module">Tipo de usuario:</label>
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1">
											<i class="far fa-keyboard"></i>
										</span>
										{!! Form::select('user_type', getRoleUserArray('list', null), $u->role, ['class' => 'form-select']) !!}
									</div>
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
		</div>
	</div>
	
</div>
@endsection