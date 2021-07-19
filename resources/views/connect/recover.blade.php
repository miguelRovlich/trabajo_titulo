@extends('connect.master')

@section('title', 'Recuperar Contraseña')

@section('content')
<div class="box box_login shadow">
	<div class="header">
		<a href="{{ url('/') }}">
			<img src="{{ url('/static/images/logo.png') }}">
		</a>
	</div>
	<div class="inside">
		{!! Form::open(['url' => '/recover']) !!}
		<label for="email">Correo electrónico:</label>
		<div class="input-group">
			<div class="input-group-prepend">
				<div class="input-group-text"><i class="far fa-envelope-open"></i></div>
			</div>
			{!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
		</div>
		
		{!! Form::submit('Recuperar contraseña', ['class' => 'btn btn-success mtop16']) !!}
		{!! Form::close() !!}

		@if(Session::has('message'))
			<div class="container">              
				<div class="mtop16 alert alert-{{ Session::get('typealert') }}" style="display:none;"> 
					{{ Session::get('message') }}
					@if ($errors->any())       
					<ul>
						@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
					@endif
					<script>
						$('.alert').slideDown();
						setTimeout(function(){ $('.alert').slideUp(); }, 10000);
					</script>
				</div>
			</div>
		@endif

		<div class="footer mtop16">
			<a href="{{ url('/register') }}">¿No tienes una cuenta?, Registrate</a>
			<a href="{{ url('/login') }}">Ingresar a mi cuenta</a>
		</div>
	</div>

	
</div>
@stop