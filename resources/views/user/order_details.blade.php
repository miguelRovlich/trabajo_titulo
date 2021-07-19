@extends('master')

@section('title', 'Orden #'.$order->o_number)

@section('content')
<div class="cart mtop32">
	<div class="container">
		<div class="items mtop32">
			<div class="row">
				<div class="col-md-9">
					<div class="panel">
						<div class="header">
							<h2 class="title"><i class="fas fa-shopping-cart"></i> Detalle de su orden #{{ $order->o_number }}</h2>
						</div>
						<div class="inside">
							<table class="table table-striped align-middle table-hover">
								<thead>
									<tr>
										<td width="80"></td>
										<td><strong>Producto</strong></td>
										<td width="160"><strong>Cantidad</strong></td>
										<td width="124"><strong>Subtotal</strong></td>
									</tr>
								</thead>
								<tbody>
									@foreach($order->getItems as $item)
									<tr>
										<td>
											<img src="{{ url('/uploads/'.$item->getProduct->file_path.'/t_'.$item->getProduct->image) }}" class="img-fluid rounded">
										</td>
										<td>
											<a href="{{ url('/product/'.$item->getProduct->id.'/'.$item->getProduct->slug) }}">
												{{ $item->label_item }}
												
												<div class="price_discount">
													Precio: 
													@if($item->discount_status == "1")
													<span class="price_initial">{{ config('madecms.currency').number_format($item->price_initial, 2, '.', ',') }}</span> / 
													@endif
													<span class="price_unit">{{ config('madecms.currency').number_format($item->price_unit, 2, '.', ',') }}  @if($item->discount_status == "1") ({{ $item->discount }}% de descuento) @endif</span>
												</div>
											</a>
										</td>
										<td>{{ $item->quantity }}</td>
										<td><strong>{{ number($item->total) }}</strong></td>
									</tr>
									@endforeach

									<tr>
										<td colspan="2"></td>
										<td><strong>Subtotal:</strong></td>
										<td><strong>{{ number($order->getSubtotal()) }}</strong></td>
									</tr>
									<tr>
										<td colspan="2"></td>
										<td><strong>Precio de envió:</strong></td>
										<td><strong>{{ number($order->delivery) }}</strong></td>
									</tr>
									<tr>
										<td colspan="2"></td>
										<td><strong>Total de la orden:</strong></td>
										<td><strong>{{ number($order->total) }}</strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				
				<div class="col-md-3">
				
					<div class="panel">
						<div class="header">
							<h2 class="title"><i class="fas fa-map-marker"></i> Tipo de orden</h2>
						</div>
						<div class="inside">
							@if($order->o_type == "0")
								<p style="margin-bottom: 2px;"><strong>Estado:</strong> {{ $order->getUserAddress->getState->name }}</p>
								<p style="margin-bottom: 2px;"><strong>Ciudad:</strong> {{ $order->getUserAddress->getCity->name }}</p>
								<p style="margin-bottom: 2px;"><strong>Dirección:</strong> {{ kvfj($order->getUserAddress->addr_info, 'add1') }}, {{ kvfj($order->getUserAddress->addr_info, 'add2') }}, {{ kvfj($order->getUserAddress->addr_info, 'add3') }}</p>

								<p style="margin-bottom: 2px;"><strong>Referencia:</strong> {{ kvfj($order->getUserAddress->addr_info, 'add4') }}</p>
							@endif

							
							<div class="mcswitch">
								<a href="#" class="sl @if($order->o_type == "0") active @endif">
									<i class="fas fa-motorcycle"></i> Domicilio
								</a>
								
								<a href="#" class="sl @if($order->o_type == "1") active @endif">
									<i class="fas fa-car-side"></i> TO GO
								</a>
							</div>
						</div>
					</div>

					<div class="panel mtop16">
						<div class="header">
							<h2 class="title"><i class="fas fa-credit-card"></i> Método de pago</h2>
						</div>
						<div class="inside">
							<div class="payments_methods">
								
								<a href="#" class="w-100 active" id="payment_method_cash" data-payment-method-id="0">
									<i class="fas fa-cash-register"></i> {{ getPaymentsMethods($order->payment_method) }}
								</a>
							</div>
						</div>
					</div>

					<div class="panel mtop16">
						<div class="header">
							<h2 class="title"><i class="far fa-envelope-open"></i> Más</h2>
						</div>
						<div class="inside">
							<label for="order_msg">Comentario:</label>
							@if($order->user_comment)
							<p>{!! $order->user_comment !!}</p>
							@endif
						
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection