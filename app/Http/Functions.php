<?php

// Key Value From Json
function kvfj($json, $key){
	if($json == null):
		return null;
	else:
		$json = $json;
		$json = json_decode($json, true);
		if(array_key_exists($key, $json)):
			return $json[$key];
		else:
			return null;
		endif;
	endif;
}

function getModulesArray(){
	$a = [
		'0' => 'Productos',
		'1' => 'Blog'
	];

	return $a;
}


function getRegiones(){
	$a = [
		'0' => 'Productos',
		'1' => 'Blog'
	];

	return $a;
}



function getUrlFileFromUploads($file, $size = null){
	if(!is_null($file)):
		$file = json_decode($file, true);
		if($size):
			return url('/uploads/'.$file['path'].'/'.$size.'_'.$file['final_name']);
		else:
			return url('/uploads/'.$file['path'].'/'.$file['final_name']);
		endif;
	endif;
}

function getRoleUserArray($mode, $id){
	$roles = ['0' => 'Usuario normal', '1' => 'Administrador'];
	if(!is_null($mode)):
		return $roles;
	else:
		return $roles[$id];
	endif;
}

function getUserStatusArray($mode, $id){
	$status = ['0' => 'Registrado', '1' => 'Verificado', '100' => 'Baneado'];
	if(!is_null($mode)):
		return $status;
	else:
		return $status[$id];
	endif;
	
}

function user_permissions(){
	$p = [
		'dashboard' => [
			'icon' => '<i class="fas fa-home"></i>',
			'title' => 'Modulo de Dashboard',
			'keys' => [
				'dashboard' => 'Puede ver el dashboard.',
				'dashboard_small_stats' => 'Puede ver las estadísticas rápidas.',
				'dashboard_sell_today' => 'Puede ver Puede ver lo facturado hoy.'
			]
		],
		'products' => [
			'icon' => '<i class="fas fa-boxes"></i>',
			'title' => 'Modulo de Productos',
			'keys' => [
				'products' => 'Puede ver el listado de productos.',
				'product_add' => 'Puede agregar nuevos productos.',
				'product_edit' => 'Puede editar productos.',
				'product_search' => 'Puede buscar productos.',
				'product_delete' => 'Puede eliminar productos.',
				'product_gallery_add' => 'Puede agregar imágenes a la galería.',
				'product_gallery_delete' => 'Puede eliminar imágenes de la galería.',
				'product_inventory' => 'Puede administrar el inventario de un producto'
			]
		],
		'categories' => [
			'icon' => '<i class="far fa-folder-open"></i>',
			'title' => 'Modulo de Categorias',
			'keys' => [
				'categories' => 'Puede ver la lista de categorías.',
				'category_add' => 'Puede crear nuevas categorías.',
				'category_edit' => 'Puede editar categorías.',
				'category_delete' => 'Puede eliminar categorías.'
			]
		],
		'users' => [
			'icon' => '<i class="fas fa-user-friends"></i>',
			'title' => 'Modulo de Usuarios',
			'keys' => [
				'user_list' => 'Puede ver la lista de usuarios.',
				'user_view' => 'Puede ver el perfil del usuario.',
				'user_edit' => 'Puede editar.',
				'user_banned' => 'Puede banear usuarios.',
				'user_permissions' => 'Puede administrar permisos de usuarios.'
			]
		],
		'sliders' => [
			'icon' => '<i class="far fa-images"></i>',
			'title' => 'Modulo de Sliders',
			'keys' => [
				'sliders_list' => 'Puede ver la lista de Sliders.',
				'slider_add' => 'Puede crear Sliders',
				'slider_edit' => 'Puede editar los sliders',
				'slider_delete' => 'Puede eliminar los sliders'
			]
		],
		'settings' => [
			'icon' => '<i class="fas fa-cogs"></i>',
			'title' => 'Modulo de Configuraciones',
			'keys' => [
				'settings' => 'Puede modificar la configuración.'
			]
		],
		'orders' => [
			'icon' => '<i class="fas fa-clipboard-list"></i>',
			'title' => 'Modulo de Ordenes',
			'keys' => [
				'orders_list' => 'Puede ver el listado de ordenes.',
				'order_view' => 'Puede ver el detalle de una orden',
				'orders_change_status' => 'Puede cambiar el estado de una orden.',
			]
		],
		'coverage' => [
			'icon' => '<i class="fas fa-shipping-fast"></i>',
			'title' => 'Cobertura de envios',
			'keys' => [
				'coverage_list' => 'Puede ver la lista de cobertura de envios',
				'coverage_add' => 'Puede crear zonas de envió.',
				'coverage_edit' => 'Puede editar zonas de envió.',
				'coverage_delete' => 'Puede eliminar zonas de envió.'
			]
		]
	];

	return $p;

}

function getUserYears(){
	$ya = date('Y');
	$ym = $ya - 18;
	$yo = $ym - 62;

	return [$ym,$yo];
}

function getMonths($mode, $key){
	$m = [
		'01' => 'Enero',
		'02' => 'Febrero',
		'03' => 'Marzo',
		'04' => 'Abril',
		'05' => 'Mayo',
		'06' => 'Junio',
		'07' => 'Julio',
		'08' => 'Agosto',
		'09' => 'Septiembre',
		'10' => 'Octubre',
		'11' => 'Noviembre',
		'12' => 'Diciembre'
	];
	if($mode == "list"){
		return $m;
	}else{
		return $m[$key];
	}
}

function getShippingMethod($method = null){
	$status = ['0' => 'Gratis', '1' => 'Valor fijo', '2' => 'Valor variable por ubicación.', '3' => 'Envió gratis / Monto Mínimo'];
	if(is_null($method)):
		return $status;
	else:
		return $status[$method];
	endif;
	
}

function getCoverageType($type = null){
	$status = ['0' => 'Estado', '1' => 'Ciudad'];
	if(is_null($type)):
		return $status;
	else:
		return $status[$type];
	endif;
	
}

function getCoverageStatus($status = null){
	$list = ['0' => 'No activo', '1' => 'Activo'];
	if(is_null($status)):
		return $list;
	else:
		return $list[$status];
	endif;
}

function getEnableorNot($status = null){
	$list = ['0' => 'No activo', '1' => 'Activo'];
	if(is_null($status)):
		return $list;
	else:
		return $list[$status];
	endif;
}

function getConfig($key){
	$var = config('madecms.'.$key);
	return json_encode($var);
}

function getPaymentsMethods($method = null){
	$list = ['0' => 'Efectivo', '1' => 'Transferencia o deposito', '2' => 'Paypal', '3' => 'Tarjeta de crédito'];
	if(is_null($method)):
		return $list;
	else:
		return $list[$method];
	endif;
}

function getOrderStatus($status = null){
	$list = [
		'0' => 'En proceso',
		'1' => 'Pago pendiente de confirmación',
		'2' => 'Pago recibido',
		'3' => 'Procesando orden',
		'4' => 'Orden enviada',
		'5' => 'Lista para recoger',
		'6' => 'Orden entregada',
		'100' => 'Orden rechazada',
	];
	if(is_null($status)):
		return $list;
	else:
		return $list[$status];
	endif;
}

function getOrderType($type = null){
	$list = [
		'0' => 'Entrega a domicilio',
		'1' => 'TO GO'
	];
	if(is_null($type)):
		return $list;
	else:
		return $list[$type];
	endif;
}

function number($number){
	return config('cms.currency').' '.number_format($number, 2, '.', ',');
}