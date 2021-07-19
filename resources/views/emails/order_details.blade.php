@extends('emails.master')

@section('content')
<p>Hola: <strong>{{ $order->getUser->name }} {{ $order->getUser->lastname }}</strong></p>
<p>Hemos recibido su orden #{{ $order->o_number }} y este es el detalle de su compra:</p>
<table class="table table-striped align-middle table-hover">
	<thead>
		<tr>
			<td width="56"></td>
			<td><strong>Producto</strong></td>
			<td width="160"><strong>Cantidad</strong></td>
			<td width="124"><strong>Subtotal</strong></td>
		</tr>
	</thead>
	<tbody>
		@foreach($order->getItems as $item)
		<tr>
			<td style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 4px 0px;">
				<img src="{{ url('/uploads/'.$item->getProduct->file_path.'/t_'.$item->getProduct->image) }}" style="width: 50px; border-radius: 4px;">
			</td>
			<td style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 4px 0px;">
				<a href="{{ url('/product/'.$item->getProduct->id.'/'.$item->getProduct->slug) }}" style="color: #333; text-decoration: none;">
					{{ $item->label_item }}
					
					<div class="price_discount" style="font-weight: 700;">
						<small>
						Precio: 
						@if($item->discount_status == "1")
						<span class="price_initial">
							{{ number($item->price_initial) }}
						</span> / 
						@endif
						<span class="price_unit">{{ number($item->price_unit) }}  @if($item->discount_status == "1") ({{ $item->discount }}% de descuento) @endif</span>
						</small>
					</div>
				</a>
			</td>
			<td style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 4px 0px;">{{ $item->quantity }}</td>
			<td style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 4px 0px;"><strong>{{ number($item->total) }}</strong></td>
		</tr>
		@endforeach

		<tr>
			<td colspan="2" style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 8px 0px;">
				
			</td>
			<td style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 8px 0px;">
				<strong>Subtotal:</strong>
			</td>
			<td style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 8px 0px;">
				<strong>{{ number($order->getSubtotal()) }}</strong>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 8px 0px;">
				
			</td>
			<td style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 8px 0px;">
				<strong>Precio de envió:</strong>
			</td>
			<td style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 8px 0px;">
				<strong>{{ number($order->delivery) }}</strong>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 8px 0px;">
				
			</td>
			<td style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 8px 0px;">
				<strong>Total de la orden:</strong>
			</td>
			<td style="vertical-align: top; border-bottom: 1px solid #f0f0f0; padding: 8px 0px;">
				<strong>{{ number($order->total) }}</strong>
			</td>
		</tr>
	</tbody>
</table>

@if(!is_null($order->user_address_id))
<p><strong>La orden será enviada a la dirección:</strong></p>
<p style="margin-bottom: 2px; margin-top: 0px;">
	<strong>Estado:</strong> {{ $order->getUserAddress->getState->name }}
</p>
<p style="margin-bottom: 2px; margin-top: 0px;">
	<strong>Ciudad:</strong> {{ $order->getUserAddress->getCity->name }}
</p>
<p style="margin-bottom: 2px; margin-top: 0px;">
	<strong>Dirección:</strong> {{ kvfj($order->getUserAddress->addr_info, 'add1') }}, {{ kvfj($order->getUserAddress->addr_info, 'add2') }}, {{ kvfj($order->getUserAddress->addr_info, 'add3') }}
</p>

<p style="margin-bottom: 2px; margin-top: 0px;">
	<strong>Referencia:</strong> {{ kvfj($order->getUserAddress->addr_info, 'add4') }}
</p>
@endif
<hr>
<p>Se reserva el derecho de aceptar o rechazar una orden, sin previo aviso, si su orden se marca como rechazada y ha seleccionado un método de pago como transferencia o tarjeta de crédito, su dinero será reembolsado de forma automática.</p>

@if($order->payment_method == "0")
<p>Ha seleccionado pagar en efectivo en su Domicio.</p>
@endif
@stop