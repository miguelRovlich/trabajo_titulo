@extends('master')

@section('title', 'Mis direcciones de entrega')

@section('content')

{{-- Script jquery --}}

<script>
			var RegionesYcomunas = {

	"regiones": [{
			"NombreRegion": "Arica y Parinacota",
			"comunas": ["Arica", "Camarones", "Putre", "General Lagos"]
	},
		{
			"NombreRegion": "Tarapacá",
			"comunas": ["Iquique", "Alto Hospicio", "Pozo Almonte", "Camiña", "Colchane", "Huara", "Pica"]
	},
		{
			"NombreRegion": "Antofagasta",
			"comunas": ["Antofagasta", "Mejillones", "Sierra Gorda", "Taltal", "Calama", "Ollagüe", "San Pedro de Atacama", "Tocopilla", "María Elena"]
	},
		{
			"NombreRegion": "Atacama",
			"comunas": ["Copiapó", "Caldera", "Tierra Amarilla", "Chañaral", "Diego de Almagro", "Vallenar", "Alto del Carmen", "Freirina", "Huasco"]
	},
		{
			"NombreRegion": "Coquimbo",
			"comunas": ["La Serena", "Coquimbo", "Andacollo", "La Higuera", "Paiguano", "Vicuña", "Illapel", "Canela", "Los Vilos", "Salamanca", "Ovalle", "Combarbalá", "Monte Patria", "Punitaqui", "Río Hurtado"]
	},
		{
			"NombreRegion": "Valparaíso",
			"comunas": ["Valparaíso", "Casablanca", "Concón", "Juan Fernández", "Puchuncaví", "Quintero", "Viña del Mar", "Isla de Pascua", "Los Andes", "Calle Larga", "Rinconada", "San Esteban", "La Ligua", "Cabildo", "Papudo", "Petorca", "Zapallar", "Quillota", "Calera", "Hijuelas", "La Cruz", "Nogales", "San Antonio", "Algarrobo", "Cartagena", "El Quisco", "El Tabo", "Santo Domingo", "San Felipe", "Catemu", "Llaillay", "Panquehue", "Putaendo", "Santa María", "Quilpué", "Limache", "Olmué", "Villa Alemana"]
	},
		{
			"NombreRegion": "Región del Libertador Gral. Bernardo O’Higgins",
			"comunas": ["Rancagua", "Codegua", "Coinco", "Coltauco", "Doñihue", "Graneros", "Las Cabras", "Machalí", "Malloa", "Mostazal", "Olivar", "Peumo", "Pichidegua", "Quinta de Tilcoco", "Rengo", "Requínoa", "San Vicente", "Pichilemu", "La Estrella", "Litueche", "Marchihue", "Navidad", "Paredones", "San Fernando", "Chépica", "Chimbarongo", "Lolol", "Nancagua", "Palmilla", "Peralillo", "Placilla", "Pumanque", "Santa Cruz"]
	},
		{
			"NombreRegion": "Región del Maule",
			"comunas": ["Talca", "ConsVtución", "Curepto", "Empedrado", "Maule", "Pelarco", "Pencahue", "Río Claro", "San Clemente", "San Rafael", "Cauquenes", "Chanco", "Pelluhue", "Curicó", "Hualañé", "Licantén", "Molina", "Rauco", "Romeral", "Sagrada Familia", "Teno", "Vichuquén", "Linares", "Colbún", "Longaví", "Parral", "ReVro", "San Javier", "Villa Alegre", "Yerbas Buenas"]
	},
		{
			"NombreRegion": "Región del Biobío",
			"comunas": ["Concepción", "Coronel", "Chiguayante", "Florida", "Hualqui", "Lota", "Penco", "San Pedro de la Paz", "Santa Juana", "Talcahuano", "Tomé", "Hualpén", "Lebu", "Arauco", "Cañete", "Contulmo", "Curanilahue", "Los Álamos", "Tirúa", "Los Ángeles", "Antuco", "Cabrero", "Laja", "Mulchén", "Nacimiento", "Negrete", "Quilaco", "Quilleco", "San Rosendo", "Santa Bárbara", "Tucapel", "Yumbel", "Alto Biobío", "Chillán", "Bulnes", "Cobquecura", "Coelemu", "Coihueco", "Chillán Viejo", "El Carmen", "Ninhue", "Ñiquén", "Pemuco", "Pinto", "Portezuelo", "Quillón", "Quirihue", "Ránquil", "San Carlos", "San Fabián", "San Ignacio", "San Nicolás", "Treguaco", "Yungay"]
	},
		{
			"NombreRegion": "Región de la Araucanía",
			"comunas": ["Temuco", "Carahue", "Cunco", "Curarrehue", "Freire", "Galvarino", "Gorbea", "Lautaro", "Loncoche", "Melipeuco", "Nueva Imperial", "Padre las Casas", "Perquenco", "Pitrufquén", "Pucón", "Saavedra", "Teodoro Schmidt", "Toltén", "Vilcún", "Villarrica", "Cholchol", "Angol", "Collipulli", "Curacautín", "Ercilla", "Lonquimay", "Los Sauces", "Lumaco", "Purén", "Renaico", "Traiguén", "Victoria", ]
	},
		{
			"NombreRegion": "Región de Los Ríos",
			"comunas": ["Valdivia", "Corral", "Lanco", "Los Lagos", "Máfil", "Mariquina", "Paillaco", "Panguipulli", "La Unión", "Futrono", "Lago Ranco", "Río Bueno"]
	},
		{
			"NombreRegion": "Región de Los Lagos",
			"comunas": ["Puerto Montt", "Calbuco", "Cochamó", "Fresia", "FruVllar", "Los Muermos", "Llanquihue", "Maullín", "Puerto Varas", "Castro", "Ancud", "Chonchi", "Curaco de Vélez", "Dalcahue", "Puqueldón", "Queilén", "Quellón", "Quemchi", "Quinchao", "Osorno", "Puerto Octay", "Purranque", "Puyehue", "Río Negro", "San Juan de la Costa", "San Pablo", "Chaitén", "Futaleufú", "Hualaihué", "Palena"]
	},
		{
			"NombreRegion": "Región Aisén del Gral. Carlos Ibáñez del Campo",
			"comunas": ["Coihaique", "Lago Verde", "Aisén", "Cisnes", "Guaitecas", "Cochrane", "O’Higgins", "Tortel", "Chile Chico", "Río Ibáñez"]
	},
		{
			"NombreRegion": "Región de Magallanes y de la AntárVca Chilena",
			"comunas": ["Punta Arenas", "Laguna Blanca", "Río Verde", "San Gregorio", "Cabo de Hornos (Ex Navarino)", "AntárVca", "Porvenir", "Primavera", "Timaukel", "Natales", "Torres del Paine"]
	},
		{
			"NombreRegion": "Región Metropolitana de Santiago",
			"comunas": ["Cerrillos", "Cerro Navia", "Conchalí", "El Bosque", "Estación Central", "Huechuraba", "Independencia", "La Cisterna", "La Florida", "La Granja", "La Pintana", "La Reina", "Las Condes", "Lo Barnechea", "Lo Espejo", "Lo Prado", "Macul", "Maipú", "Ñuñoa", "Pedro Aguirre Cerda", "Peñalolén", "Providencia", "Pudahuel", "Quilicura", "Quinta Normal", "Recoleta", "Renca", "San Joaquín", "San Miguel", "San Ramón", "Vitacura", "Puente Alto", "Pirque", "San José de Maipo", "Colina", "Lampa", "TilVl", "San Bernardo", "Buin", "Calera de Tango", "Paine", "Melipilla", "Alhué", "Curacaví", "María Pinto", "San Pedro", "Talagante", "El Monte", "Isla de Maipo", "Padre Hurtado", "Peñaflor"]
	}]
	}


	jQuery(document).ready(function () {

	var iRegion = 0;
	var htmlRegion = '<option value="sin-region">Seleccione región</option><option value="sin-region">--</option>';
	var htmlComunas = '<option value="sin-region">Seleccione comuna</option><option value="sin-region">--</option>';

	jQuery.each(RegionesYcomunas.regiones, function () {
		htmlRegion = htmlRegion + '<option value="' + RegionesYcomunas.regiones[iRegion].NombreRegion + '">' + RegionesYcomunas.regiones[iRegion].NombreRegion + '</option>';
		iRegion++;
	});

	jQuery('#regiones').html(htmlRegion);
	jQuery('#comunas').html(htmlComunas);

	jQuery('#regiones').change(function () {
		var iRegiones = 0;
		var valorRegion = jQuery(this).val();
		var htmlComuna = '<option value="sin-comuna">Seleccione comuna</option><option value="sin-comuna">--</option>';
		jQuery.each(RegionesYcomunas.regiones, function () {
			if (RegionesYcomunas.regiones[iRegiones].NombreRegion == valorRegion) {
				var iComunas = 0;
				jQuery.each(RegionesYcomunas.regiones[iRegiones].comunas, function () {
					htmlComuna = htmlComuna + '<option value="' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '">' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '</option>';
					iComunas++;
				});
			}
			iRegiones++;
		});
		jQuery('#comunas').html(htmlComuna);
	});
	jQuery('#comunas').change(function () {
		if (jQuery(this).val() == 'sin-region') {
			alert('selecciones Región');
		} else if (jQuery(this).val() == 'sin-comuna') {
			alert('selecciones Comuna');
		}
	});
	jQuery('#regiones').change(function () {
		if (jQuery(this).val() == 'sin-region') {
			alert('selecciones Región');
		}
	});

	});


</script>

<div class="row mtop32">
	<div class="col-md-3">
		<div class="panel shadow">
			<div class="header">
				<h2 class="title"><i class="fas fa-map-marker-alt"></i> Agregar dirección</h2>
			</div>
			<div class="inside">
				{!! Form::open(['url' => '/account/address/add']) !!}
				<label for="name">Nombre:</label>
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1">
						<i class="far fa-keyboard"></i>
					</span>
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>

				<label for="module" class="mtop16">Region:</label>
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1">
						<i class="far fa-keyboard"></i>
					</span>
					{{-- <select id="regiones"></select> --}}
					{!! Form::select('state', $states, null, ['class' => 'form-select', 'id' => 'regiones', 'required']) !!}
				</div>

				<label for="city" class="mtop16">Ciudad:</label>
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1">
						<i class="far fa-keyboard"></i>
					</span>
					{!! Form::select('city', ['1','viña del mar'], null, ['class' => 'form-select', 'id' => 'comunas', 'required']) !!}
				</div>

				<label for="add1" class="mtop16">Barrio, colonia o residencial:</label>
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1">
						<i class="far fa-keyboard"></i>
					</span>
					{!! Form::text('add1', null, ['class' => 'form-control']) !!}
				</div>

				<label for="add2" class="mtop16">Calle / Avenida / Bloque:</label>
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1">
						<i class="far fa-keyboard"></i>
					</span>
					{!! Form::text('add2', null, ['class' => 'form-control']) !!}
				</div>

				<label for="add3" class="mtop16">Casa / Apartamento #:</label>
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1">
						<i class="far fa-keyboard"></i>
					</span>
					{!! Form::text('add3', null, ['class' => 'form-control']) !!}
				</div>

				<label for="add4" class="mtop16">Referencia:</label>
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1">
						<i class="far fa-keyboard"></i>
					</span>
					{!! Form::text('add4', null, ['class' => 'form-control']) !!}
				</div>


				<div class="row mtop16">
					<div class="col-md-12">
						{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>
				{!! Form::close() !!}

			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="panel shadow">
			<div class="header">
				<h2 class="title"><i class="fas fa-map-marker-alt"></i> Mis direcciones de entrega</h2>
			</div>
			<div class="inside">
				<table class="table table-striped">
					<thead>
						<tr>
							<td><strong>Nombre</strong></td>
							<td><strong>Estado / Ciudad</strong></td>
							<td><strong>Dirección</strong></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach(Auth::user()->getAddress as $address)
						<tr>
							<td>
								<p>{{ $address->name }}</p>
							</td>
							<td>
								<p>{{ $address->getState->name }} - {{ $address->getCity->name }}</p>
								@if($address->default == "0")
								<p><a href="{{ url('/account/address/'.$address->id.'/setdefault') }}">Convertir en principal</a></p>
								@else
								<p><small>Dirección de entrega principal</small></p>
								@endif
							</td>
							<td>
								<p>
									<strong>Barrio, colonia o residencial:</strong> {{ kvfj($address->addr_info, 'add1') }}
								</p>
								<p>
									<strong>Calle / Avenida / Bloque:</strong> {{ kvfj($address->addr_info, 'add2') }}
								</p>
								<p>
									<strong>Casa / Apartamento #:</strong> {{ kvfj($address->addr_info, 'add3') }}
								</p>
								<p>
									<strong>Referencia:</strong> {{ kvfj($address->addr_info, 'add4') }}
								</p>
							</td>
							<td>
								@if($address->default == "0")
								<a href="#" class="btn-delete btn-deleted" data-object="{{ $address->id }}" data-action="delete" data-path="account/address">
									<i class="far fa-trash-alt"></i>
								</a>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection