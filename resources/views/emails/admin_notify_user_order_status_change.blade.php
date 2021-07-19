@extends('emails.master')

@section('content')
<p>Hola: <strong>{{ $name }}</strong></p>
<p>Su orden #{{ $o_number }} fue marcada como: <strong>{{ getOrderStatus($status) }}</strong></p>

@if($status == '6')
<p>Muchas gracias por confiar en nuestros productos</p>
@endif

@stop