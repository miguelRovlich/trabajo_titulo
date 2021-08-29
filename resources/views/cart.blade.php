@extends('master')

@section('title', 'Carrito de compra')

@section('content')
<div class="cart mtop32">
	<div class="container">
		@if(count(collect($items)) == "0")
		<div class="no_items shadow">
			<div class="inside">
				<p><img src="{{ url('/static/images/empty-cart.png') }}"></p>
				<p><strong>Hola {{ Auth::user()->name }}</strong>, Aun no tienes nada en tu carrito de compra, anímate a agregar uno de nuestros increíbles productos</p>
				<p>
					<a href="{{ url('/store') }}">Ir a la tienda</a>
				</p>
			</div>
		</div>
		@else
		<div class="items mtop32">
			<div class="row">
				<div class="col-md-9">
					<div class="panel">
						<div class="header">
							<h2 class="title"><i class="fas fa-shopping-cart"></i> Carrito de compras</h2>
						</div>
						<div class="inside">
							<table class="table table-striped align-middle table-hover">
								<thead>
									<tr>
										<td></td>
										<td width="80"></td>
										<td><strong>Producto</strong></td>
										<td width="160"><strong>Cantidad</strong></td>
										<td width="124"><strong>Subtotal</strong></td>
									</tr>
								</thead>
								<tbody>
									@foreach($items as $item)
									<tr>
										<td>
											<a href="{{ url('/cart/item/'.$item->id.'/delete') }}" class="btn-delete">
												<i class="far fa-trash-alt"></i>
											</a>
										</td>
										<td>
											{{-- <img src="{{ url('/uploads/'.$item->getProduct->file_path.'/t_'.$item->getProduct->image) }}" class="img-fluid rounded"> --}}
										</td>
										<td>
											<a href="{{ url('/product/'.$item->getProduct->id.'/'.$item->getProduct->slug) }}">
												{{ $item->label_item }}
												
												<div class="price_discount">
													Precio: 
													@if($item->discount_status == "1")
													<span class="price_initial">{{ config('madecms.currency').number_format($item->price_initial, 0, '.', '.') }}</span> / 
													@endif
													<span class="price_unit">{{ config('madecms.currency').number_format($item->price_unit, 0, '.', '.') }}  @if($item->discount_status == "1") ({{ $item->discount }}% de descuento) @endif</span>
												</div>
											</a>
										</td>
										<td>
											<div class="form_quantity">
											{!! Form::open(['url' => '/cart/item/'.$item->id.'/update']) !!}
											{!! Form::number('quantity', $item->quantity, ['min' => '1', 'class' => 'form-control']) !!}
											<button type="submit"><i class="far fa-save"></i></button>
											{!! Form::close() !!}
											</div>
										</td>
										<td><strong>{{ number($item->total) }}</strong></td>
									</tr>
									@endforeach

									<tr>
										<td colspan="3"></td>
										<td><strong>Subtotal:</strong></td>
										<td><strong>{{ number($order->getSubtotal()) }}</strong></td>
									</tr>
									<tr>
										<td colspan="3"></td>
										<td><strong>Precio de envió:</strong></td>
										<td><strong>{{ number($shipping) }}</strong></td>
									</tr>
									<tr>
										<td colspan="3"></td>
										<td><strong>Total de la orden:</strong></td>
										<td><strong>{{ number($order->total) }}</strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				
				<div class="col-md-3">
					{!! Form::open(['url' => '/cart']) !!}
					{!! Form::hidden('payment_method', null, ['id' => 'field_payment_method_id']) !!}
					<div class="panel">
						<div class="header">
							<h2 class="title"><i class="fas fa-map-marker"></i> Tipo de orden</h2>
						</div>
						<div class="inside">
							@if($order->o_type == "0")
								@if(!is_null(Auth::user()->getAddressDefault))
								<p style="margin-bottom: 2px;"><strong>Estado:</strong> {{ Auth::user()->getAddressDefault->getState->name }}</p>
								<p style="margin-bottom: 2px;"><strong>Ciudad:</strong> {{ Auth::user()->getAddressDefault->getCity->name }}</p>
								<p style="margin-bottom: 2px;"><strong>Dirección:</strong> {{ kvfj(Auth::user()->getAddressDefault->addr_info, 'add1') }}, {{ kvfj(Auth::user()->getAddressDefault->addr_info, 'add2') }}, {{ kvfj(Auth::user()->getAddressDefault->addr_info, 'add3') }}</p>

								<p style="margin-bottom: 2px;"><strong>Referencia:</strong> {{ kvfj(Auth::user()->getAddressDefault->addr_info, 'add4') }}</p>

								<p><a href="{{ url('/account/address') }}" class="btn btn-dark mtop16">Cambiar Dirección</a></p>
								@else
								<p>Su usuario no tiene direcciones registradas</p>
								<p><a href="{{ url('/account/address') }}" class="btn btn-dark mtop16">Agregar Dirección</a></p>
								@endif
							@endif

							@if(config('cms.to_go') == "1")
							<div class="mcswitch">
								<a href="{{ url('/cart/'.$order->id.'/type/0') }}" class="sl @if($order->o_type == "0") active @endif">
									<i class="fas fa-motorcycle"></i> Domicilio
								</a>
								
								<a href="{{ url('/cart/'.$order->id.'/type/1') }}" class="sl @if($order->o_type == "1") active @endif">
									<i class="fas fa-car-side"></i> TO GO
								</a>
							</div>
							@endif
						</div>
					</div>

					<div class="panel mtop16">
						<div class="header">
							<h2 class="title"><i class="fas fa-credit-card"></i> Método de pago</h2>
						</div>
						<div class="inside">
							<div class="payments_methods">
								@if(config('cms.payment_method_cash') == "1")
									<a href="#" class="btn-payment-method w-100" id="payment_method_cash" data-payment-method-id="0">
										<i class="fas fa-cash-register"></i> Pagar en efectivo
									</a>
								@endif

								@if(config('cms.payment_method_transfer') == "1")
									<a href="#" class="btn-payment-method w-100" id="payment_method_transfer" data-payment-method-id="1">
										<i class="fas fa-comment-dollar"></i> Transferencia o deposito
									</a>
								@endif

								@if(config('cms.payment_method_paypal') == "1")
									<a href="#" class="btn-payment-method w-100" id="payment_method_paypal" data-payment-method-id="2">
										<i class="fab fa-paypal"></i> Pagar con Paypal
									</a>
								@endif

								@if(config('cms.payment_method_credit_card') == "1")
									<a href="#" class="btn-payment-method w-100" id="payment_method_credit_card" data-payment-method-id="3">
										<i class="fas fa-credit-card"></i> Tarjeta de crédito
									</a>
								@endif
							</div>
						</div>
					</div>

					<div class="panel mtop16">
						<div class="header">
							<h2 class="title"><i class="far fa-envelope-open"></i> Más</h2>
						</div>
						<div class="inside">
							<label for="order_msg">Enviar comentario:</label>
							{!! Form::textarea('order_msg', null, ['class' => 'form-control', 'rows' => 3]) !!}
						</div>
					</div>

					<div class="panel mtop16">
						<div class="inside">
							{!! Form::submit('Completar orden', ['class' => 'btn btn-success w-100 disabled', 'id' => 'pay_btn_complete']) !!}
						</div>
					</div>
				</div>
				
			</div>
		</div>
		@endif
		
	</div>
</div>
@stop
