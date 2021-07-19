@extends('emails.master')

@section('content')
<p>Hola: <strong>{{ $name }}</strong></p>
<p>Este es un correo electrónico que le ayudara a reestablecer la contraseña de su cuenta en nuestra plataforma.</p>
<p>Para continuar haga clic en el siguiente botón e ingrese el siguiente código: <h2>{{ $code }}</h2></p>
<p><a href="{{ url('/reset?email='.$email) }}" style="display: inline-block; background-color: #2caaff; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none;">Resetear mi contraseñar</a></p>
<p>Si el botón anterior no le funciona, copie y peque la siguiente url en su navegador:</p>
<p>{{ url('/reset?email='.$email) }}</p>
@stop