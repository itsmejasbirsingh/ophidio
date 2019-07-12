@extends('public.master')

@section('content')
	@if($products->count())
	<div class="row products">
	    @foreach($products as $product)

    <div class="col-sm-4 product">
    	<h2>{{ $product->title }}</h2>
	    <div><img  src="{{ asset('/img/products/'.$product->featured_image) }}"></div>
	    <div><b>{{ $product->price }}</b></div>
	    <div><button class="add-to-cart-bttn">Add to cart</button></div>
    </div>
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