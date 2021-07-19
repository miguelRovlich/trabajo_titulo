@extends('admin.master')

@section('title', 'Configuraciones')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/settings') }}"><i class="fas fa-cogs"></i> Configuraciones</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	{!! Form::open(['url' => '/admin/settings']) !!}

	<!-- Row #1 -->
	<div class="row">
		<div class="col-md-4 d-flex">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-cogs"></i> General</h2>
				</div>

				<div class="inside">

					<label for="name">Nombre de la empresa:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::text('name', Config::get('cms.name'), ['class' => 'form-control']) !!}
					</div>

					<label for="website" class="mtop16">Sitio web:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::text('website', Config::get('cms.website'), ['class' => 'form-control']) !!}
					</div>

					<label for="company_phone" class="mtop16">Teléfono:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::number('company_phone', Config::get('cms.company_phone'), ['class' => 'form-control']) !!}
					</div>

					<label for="email_from" class="mtop16">Correo electrónico remitente:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::email('email_from', Config::get('cms.email_from'), ['class' => 'form-control']) !!}
					</div>

					<label for="maintenance_mode" class="mtop16">Modo mantenimiento:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::select('maintenance_mode', ['0' => 'Desactivado', '1' => 'Activo'], Config::get('cms.maintenance_mode'), ['class' => 'form-select']) !!}
					</div>

				</div>
			</div>
		</div>

		<div class="col-md-4 d-flex">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-coins"></i> Moneda y precios</h2>
				</div>

				<div class="inside">
					<label for="currency">Símbolo de Moneda:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::text('currency', Config::get('cms.currency'), ['class' => 'form-control']) !!}
					</div>

					<label for="shop_min_amount" class="mtop16">Monto mínimo de compra:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::number('shop_min_amount', Config::get('cms.shop_min_amount'), ['class' => 'form-control', 'min' => '1', 'required']) !!}
					</div>

					<label for="products_per_page" class="mtop16">Configuración de precio de envió:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::select('shipping_method', getShippingMethod(), Config::get('cms.shipping_method'), ['class' => 'form-control']) !!}
					</div>

					<label for="products_per_page" class="mtop16">Valor del envío:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::number('shipping_default_value', Config::get('cms.shipping_default_value'), ['class' => 'form-control', 'min' => 1, 'required']) !!}
					</div>

					<label for="products_per_page" class="mtop16">Monto mínimo para envió gratis:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::number('shipping_amount_min', Config::get('cms.shipping_amount_min'), ['class' => 'form-control', 'min' => 0, 'required']) !!}
					</div>

					<label for="to_go" class="mtop16">Ordenes TOGO:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-map-pin"></i>
						</span>
						{!! Form::select('to_go', getEnableorNot(), Config::get('cms.to_go'), ['class' => 'form-select']) !!}
					</div>
					

				</div>
			</div>
		</div>


		<div class="col-md-4 d-flex">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-wifi"></i> Redes sociales</h2>
				</div>

				<div class="inside">

					<label for="social_facebook">Facebook:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fab fa-facebook"></i>
						</span>
						{!! Form::text('social_facebook', Config::get('cms.social_facebook'), ['class' => 'form-control']) !!}
					</div>

					<label for="social_instagram" class="mtop16">Instagram:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fab fa-instagram"></i>
						</span>
						{!! Form::text('social_instagram', Config::get('cms.social_instagram'), ['class' => 'form-control']) !!}
					</div>

					<label for="social_twitter" class="mtop16">Twitter:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fab fa-twitter"></i>
						</span>
						{!! Form::text('social_twitter', Config::get('cms.social_twitter'), ['class' => 'form-control']) !!}
					</div>

					<label for="social_youtube" class="mtop16">Youtube:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fab fa-youtube"></i>
						</span>
						{!! Form::text('social_youtube', Config::get('cms.social_youtube'), ['class' => 'form-control']) !!}
					</div>

					<label for="social_whatsapp" class="mtop16">Whatsapp:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fab fa-whatsapp"></i>
						</span>
						{!! Form::text('social_whatsapp', Config::get('cms.social_whatsapp'), ['class' => 'form-control']) !!}
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- End Row #1 -->

	<!-- Row #2 -->
	<div class="row mtop16">
		<div class="col-md-4 d-flex">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-wallet"></i> Pagos / Integraciones</h2>
				</div>

				<div class="inside">
					<label for="payment_method_cash">Pagos en efectivo:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-cash-register"></i>
						</span>
						{!! Form::select('payment_method_cash', getEnableorNot(), Config::get('cms.payment_method_cash'), ['class' => 'form-select']) !!}
					</div>

					<label for="payment_method_transfer" class="mtop16">Transferencia / Deposito bancario:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-comment-dollar"></i>
						</span>
						{!! Form::select('payment_method_transfer', getEnableorNot(), Config::get('cms.payment_method_transfer'), ['class' => 'form-select']) !!}
					</div>

					<label for="payment_method_paypal" class="mtop16">Paypal:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fab fa-paypal"></i>
						</span>
						{!! Form::select('payment_method_paypal', getEnableorNot(), Config::get('cms.payment_method_paypal'), ['class' => 'form-select']) !!}
					</div>

					<label for="payment_method_credit_card" class="mtop16">Tarjeta de crédito:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-credit-card"></i>
						</span>
						{!! Form::select('payment_method_credit_card', getEnableorNot(), Config::get('cms.payment_method_credit_card'), ['class' => 'form-select']) !!}
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4 d-flex">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="far fa-file"></i> Paginación</h2>
				</div>

				<div class="inside">
					<label for="products_per_page">Productos para mostrar por pagina:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::number('products_per_page', Config::get('cms.products_per_page'), ['class' => 'form-control', 'min' => 1, 'required']) !!}
					</div>

					<label for="products_per_page_random" class="mtop16">Productos para mostrar por pagina (Random):</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::number('products_per_page_random', Config::get('cms.products_per_page_random'), ['class' => 'form-control', 'min' => 1, 'required']) !!}
					</div>
				</div>
			</div>
		</div>


		<div class="col-md-4 d-flex">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fab fa-linux"></i> Servidor</h2>
				</div>

				<div class="inside">
					<label for="server_uploads_paths">Uploads Server Path:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::text('server_uploads_paths', Config::get('cms.server_uploads_paths'), ['class' => 'form-control', 'required']) !!}
					</div>

					<label for="server_uploads_user_paths" class="mtop16">Uploads Server Users Path:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::text('server_uploads_user_paths', Config::get('cms.server_uploads_user_paths'), ['class' => 'form-control', 'required']) !!}
					</div>


					<label for="server_webapp_path" class="mtop16">Path webapp:</label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="far fa-keyboard"></i>
						</span>
						{!! Form::text('server_webapp_path', Config::get('cms.server_webapp_path'), ['class' => 'form-control', 'required']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Row #2 -->

	<div class="row mtop16">
		<div class="col-md-12">
			<div class="panel shadow">
				<div class="inside">
					{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}	
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
	
</div>
@endsection