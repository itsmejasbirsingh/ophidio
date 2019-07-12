@extends('public.master')

@section('content')
	@if($products->count())
	<div class="row products">
	    @foreach($products as $product)
<form method="post" action="{{ route('saveCart') }}">
@csrf
	<div class="col-sm-4 product">
    	<a href="{{ route('product_single', $product->title ) }}">
    		<h2>{{ $product->title }}</h2>
	    	<div><img  src="{{ asset('/img/products/'.$product->featured_image) }}"></div>
    	</a>
	    <div><b>{{ $product->price }}</b></div>
	    <div><button class="add-to-cart-bttn">Add to cart</button></div>
    </div>
    <input type="hidden" name="id" value="{{ $product->id }}">
    <input type="hidden" name="name" value="{{ $product->title }}">
    <input type="hidden" name="price" value="{{ $product->price }}">
</form>
@endforeach
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
</style>