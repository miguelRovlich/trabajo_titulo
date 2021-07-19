@extends('master')

@section('title', 'Tienda')

@section('content')
<div class="store">
	<div class="row mtop32">
		<div class="col-md-3">
			<div class="categories_list shadow">
				<h2 class="title"><i class="fas fa-stream"></i> Categorias</h2>
				<ul>
					@foreach($categories as $category)
					<li>
						<a href="{{ url('/store/category/'.$category->id.'/'.$category->slug) }}">
							<img src="{{ getUrlFileFromUploads($category->icon) }}" alt="{{ $category->name }}"> {{ $category->name }}
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="col-md-9">
			<div class="store_white">
				<section>
					<h2 class="home_title"><i class="fas fa-store-alt"></i> Últimos productos agregados</h2>
					<div class="products_list" id="products_list"></div>
				
					<div class="load_more_products">
						<a href="#" id="load_more_products"><i class="far fa-paper-plane"></i> Cargar mas productos</a>
					</div>
				</section> 
			</div>
		</div>	
	</div>
</div>
@endsection