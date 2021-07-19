@extends('admin.master')

@section('title', 'Usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users') }}"><i class="fas fa-user-friends"></i> Usuarios</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-user-friends"></i> Usuarios</h2>
		</div>

		<div class="inside">
			<div class="row">
				<div class="col-md-2 offset-md-10">
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%;">
							<i class="fas fa-filter"></i> Filtrar
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="{{ url('/admin/users/all') }}"><i class="fas fa-stream"></i> Todos</a>
							<a class="dropdown-item" href="{{ url('/admin/users/0') }}"><i class="fas fa-unlink"></i> No verificados</a>
							<a class="dropdown-item" href="{{ url('/admin/users/1') }}"><i class="fas fa-user-check"></i> Verificados</a>
							<a class="dropdown-item" href="{{ url('/admin/users/100') }}"><i class="fas fa-heart-broken"></i> Suspendidos</a>
						</div>
					</div>
				</div>
			</div>

			<table class="table mtop16">
				<thead>
					<tr>
						<td>ID</td>
						<td></td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Email</td>
						<td>Role</td>
						<td>Estado</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td width="48">
							@if(is_null($user->avatar))
							<img src="{{ url('/static/images/default-avatar.png') }}" class="img-fluid rounded-circle">
							@else
							<img src="{{ url('/uploads_users/'.$user->id.'/'.$user->avatar) }}" class="img-fluid rounded-circle">
							@endif
						</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->lastname }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ getRoleUserArray(null,$user->role) }}</td>
						<td>{{ getUserStatusArray(null,$user->status) }}</td>
						<td>
							<div class="opts">
							<a href="{{ url('/admin/user/'.$user->id.'/view') }}" data-toggle="tooltip" data-placement="top" title="Ver perfil">
								<i class="fas fa-id-card-alt"></i>
							</a>

							<a href="{{ url('/admin/user/'.$user->id.'/permissions') }}" data-toggle="tooltip" data-placement="top" title="Permisos de usuario">
								<i class="fas fa-cogs"></i>
							</a>
							</div>
						</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="8">{!! $users->render() !!}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection