@extends('master')

@section('content')
	@if($products->count())
	<div class="row">
	<div class="col-sm-2">
		<h3>Filters</h3>
	</div>
	<div class="col-sm-10">
	<div class="search-product">
		<form>
			<label>Search product</label>
			<input type="text" name="s" class="form-control">
		</form>
	</div>
		<div class="products">
			@foreach($products as $product)
			<div class="product col-sm-3">
				<form method="post" action="{{ route('saveCart') }}">
				@csrf
					
				    	<a href="{{ route('product_single', $product->title ) }}">
				    		<h2>{{ $product->title }}</h2>
					    	<div><img src="{{ asset('/img/products/'.$product->featured_image) }}"></div>
				    	</a>
					    <div><b>${{ $product->price }}</b></div>
					    <div><button class="add-to-cart-bttn btn btn-primary">Add to cart</button></div>
				    
				    <input type="hidden" name="id" value="{{ $product->id }}">
				    <input type="hidden" name="name" value="{{ $product->title }}">
				    <input type="hidden" name="price" value="{{ $product->price }}">
				</form>
			</div>
		@endforeach
		</div>
	</div>	    
</div>
		@endif
	@stop

<style type="text/css">
	.products .product{
		padding: 20px;

	}
	.add-to-cart-bttn{
		padding: 10px;
	}
	.search-product{
		padding: 10px;
		float: right;
	}
	.products{
		clear: both;
	}
	.add-to-cart-bttn{
		width: 100%;
	}
</style>