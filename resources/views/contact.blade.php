@extends('master')

@section('title', 'Contacto')

@section('content')
<div class="store">
	<div class="row mtop32">

		<div class="col-md-11"> 
			<div class="store_white">
				<section>
					{{-- <h2 class="home_title"> Estemos en contacto!</h2>
                    {!! Form::open(['url' => '/contact/add']) !!}
					@csrf  

					@method('PUT')
					<form action="/my-handling-form-page" method="post">

					</form>
					<label for="name">Nombre:</label>
					<div class="input-group">
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
					</div>

					<label for="name" class="mtop16">Correo Electronico:</label>
					<div class="input-group">
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
					</div>

					<label for="name" class="mtop16">Mensaje:</label>
					<div class="input-group">
                        <textarea class="form-control" id="message" rows="3"></textarea>
					</div>

					<div class="load_more_products">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-info mtop16']) !!}
						
					</div>
                    {!! Form::close() !!}					 --}}
                





					<h3 class="home_title">Estemos en contacto!</h3>
					<p class="mtop16 p-uwu">Estamos aqui para ayudarte, no dudes en contactarte con nosotros para resolver tus dudas o dejar tus sugerencias.</p>
					<div class="row">
						<div class="col">
							<form action="{{route('store')}}" method="get">
								@csrf
								@method('PUT')
								<div class="form-group">
									<label for="Nombre" class="mtop16">Nombre</label>
									<input type="text" id="nombre" name="nombre" class="form-control">
									
									
									
									<label for="name" class="mtop16">Correo Electronico:</label>
									<div class="input-group">
										{!! Form::email('email', null, ['class' => 'form-control']) !!}
									</div>
									
									<label for="name" class="mtop16">Mensaje:</label>
									<div class="input-group">
										<textarea class="form-control" id="message" rows="3"></textarea>
									</div>

									<div class="form-group">
										{{-- <button href="/contact" type="submit" class="btn btn-info mtop16">enviar</button> --}}
									<a href="/contact" class="btn btn-info mtop16">enviar</a>
									</div>
								</div>
							</form>
						</div>
					</div>
                </section> 
			</div>


		</div>	
	</div>
</div>
@endsection