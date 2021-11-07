<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Hola {{ $name }}, bienvenido a Nibble</h2>
    <p>Por faor confirma tu correo electronico</p>
    <p>Para ello simplemente debes hacer click en el siguiente enlace</p>

    <a href="{{url('register/verify/'. $confirmation_code)}}">
        Confirmar Correo
    </a>
</body>
</html>