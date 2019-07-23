@extends('master')

@section('content')
	<div class="row">
	<div class="col-sm-2">
		<div class="product-filters">
			@if(App\Models\ProductCategory::get()->count())
			<h4>Filter by category</h4>
			<ul class="list-group category-filter">
				@foreach( App\Models\ProductCategory::get() as $category )
					<li class="list-group-item {{ ! empty( $active_category ) && $active_category === $category->name ? 'active' : '' }}"><a href="{{ route('productCategory', $category->name) }}">{{ $category->name }}</a></li>
				@endforeach
			</ul>	
			@endif
		</div>
	</div>
	<div class="col-sm-10">
	<div class="sort-product">
		<form>
		<label>Sort products</label>
			<div>
				<select name="sortby" class="sortby">
					<option value="">-- Default --</option>
					<option {{ app('request')->input('sortby') === 'price-asc' ? 'selected' : '' }} value="price-asc">Price: Low to high</option>
					<option {{ app('request')->input('sortby') === 'price-desc' ? 'selected' : '' }} value="price-desc">Price: High to low</option>
				</select>
			</div>
		</form>
	</div>
	<div class="search-product">
		<form>
			<label>Search product</label>
			<input type="text" name="s" class="form-control" placeholder="Product/Category" value="{{ app('request')->input('s') }}">
		</form>
	</div>
	<div class="products">
		@if($products->count())
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
		@else
	<div class="alert alert-danger">No product found!</div>
	</div>
		@endif
	</div>	    
</div>
		
@stop

@section('extra-js')
<script type="text/javascript">
	$('.sortby').on('change', function(){
		var sortby = $(this).val();
		$(this).closest('form').submit();
	});
</script>
@endsection

<style type="text/css">
	.products .product{
		padding: 20px;

	}
	.add-to-cart-bttn{
		padding: 10px;
	}
	.sort-product, .search-product{
		padding: 10px;
		float: right;
	}
	.products{
		clear: both;
	}
	.add-to-cart-bttn{
		width: 100%;
	}

	.category-filter li.active, .category-filter li.active > a{
		background: #ccc;
		color: black;
	}
</style>