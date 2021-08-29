@extends('admin.master')

@section('title', 'Orden #'.$order->o_number)

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/orders/all/all') }}"><i class="fas fa-clipboard-list"></i> Órdenes</a>
</li>
<li class="breadcrumb-item">
	<a href="#"><i class="fas fa-clipboard-list"></i> Orden #{{ $order->o_number }}</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="order">
		<div class="row">
			<!-- Col #1 -->
			<div class="col-md-3">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="far fa-user-circle"></i> Usuario</h2>
					</div>

					<div class="inside">
						<div class="profile">
							<div class="photo">
								@if(is_null($order->getUser->avatar))
								<img src="{{ url('/static/images/default-avatar.png') }}" class="img-fluid rounded-circle">
								@else
								<img src="{{ url('/uploads_users/'.$order->getUser->id.'/'.$order->getUser->avatar) }}" class="img-fluid rounded-circle">
								@endif
							</div>

							<div class="info mtop16">
								<ul>
									<li><i class="far fa-user-circle"></i> Nombre: {{ $order->getUser->name.' '.$order->getUser->lastname }}</li>
									<li><i class="far fa-envelope-open"></i> E-Mail: {{ $order->getUser->email}}</li>
									@if($order->getUser->phone)
									<li><i class="fas fa-phone"></i> Teléfono: {{ $order->getUser->phone}}</li>
									@endif
								</ul>
								<a href="{{ url('/admin/user/'.$order->user_id.'/view') }}" class="btn btn-primary btn-sm mtop16">Ver usuario</a>
							</div>
						</div>
					</div>

				</div>


				<div class="panel shadow mtop16">
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
			</div>
			<!-- End Col #1 -->

			<!-- Col #2 -->
			<div class="col-md-6">
				<div class="panel shadow">
					<div class="header">
						<h2 class="title"><i class="fas fa-clipboard-list"></i> Órdenes</h2>
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
										{{-- <img src="{{ url('/uploads/'.$item->getProduct->file_path.'/t_'.$item->getProduct->image) }}" class="img-fluid rounded"> --}}
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

						@if(kvfj(Auth::user()->permissions, 'orders_change_status'))
						<div class="order_status mtop16">
							@if($order->status == '6' || $order->status == '100')
							{!! Form::open(['url' => '#', 'disabled']) !!}
							@else
							{!! Form::open(['url' => '/admin/order/'.$order->id.'/view']) !!}
							@endif
							<div class="row">
								<div class="col-md-12"><strong>Estado de la orden:</strong></div>
							</div>
							<div class="row">
								<div class="col-md-8">
									@if($order->o_type == "0")
									{!! Form::select('status', Arr::except(getOrderStatus(), ['0', '5']), $order->status, ['class' => 'form-select']) !!}
									@else
									{!! Form::select('status', Arr::except(getOrderStatus(), ['0', '4']), $order->status, ['class' => 'form-select']) !!}
									@endif
								</div>

								<div class="col-md-4">
									@if($order->status == '6' || $order->status == '100')
									{!! Form::submit('Actualizar', ['class' => 'btn btn-success w-100', 'disabled']) !!}
									@else
									{!! Form::submit('Actualizar', ['class' => 'btn btn-success w-100']) !!}
									@endif
									
								</div>
							</div>
						{!! Form::close() !!}
						</div>
						@endif
					</div>
				</div>
			</div>
			<!-- End Col #2 -->

			<!-- Col #3 -->
			<div class="col-md-3">
				<div class="panel shadow">
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

				<div class="panel shadow mtop16">
					<div class="header">
						<h2 class="title"><i class="far fa-calendar-check"></i> Actividad</h2>
					</div>
					<div class="inside">
						<div class="profile">
							<div class="info">
								<ul>
									<li>
										<strong><i class="far fa-clock"></i> Solicitada:</strong> {{ $order->request_at }}
									</li>
									<li>
										<strong><i class="far fa-credit-card"></i> Pagada:</strong> {{ $order->paid_at }}
									</li>
									<li>
										<strong><i class="fas fa-box"></i> Procesando:</strong> {{ $order->process_at }}
									</li>
									@if($order->o_type == "0")
									<li>
										<strong><i class="fas fa-motorcycle"></i> Enviada:</strong> {{ $order->send_at }}
									</li>
									@else
									<li>
										<strong><i class="fas fa-motorcycle"></i> Lista:</strong> {{ $order->send_at }}
									</li>
									@endif
									<li>
										<strong><i class="fas fa-shipping-fast"></i> Entregada:</strong> {{ $order->delivery_at }}
									</li>

									@if($order->rejected_at)
									<li>
										<strong><i class="fas fa-recycle"></i> Rechazada:</strong> {{ $order->rejected_at }}
									</li>
									@endif
								</ul>
							</div>
						</div>
					
					</div>
				</div>

				<div class="panel shadow mtop16">
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
			<!-- End Col #3 -->
		</div>
	</div>
</div>
@endsection