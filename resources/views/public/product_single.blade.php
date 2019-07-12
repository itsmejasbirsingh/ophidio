@extends('public.master')

@section('content')
	
		<div class="container content">	

		@if($product->count())
				<div class="col-md-3">
					<div class="product col-md-3 service-image-left">
                    
						<center>
							<img width="200px" src="{{ asset('/img/products/'.$product->featured_image) }}">
						</center>
					</div>
				
				</div>
				<form method="post" action="{{ route('saveCart') }}">
				@csrf
					<div class="col-md-9">
						<div class="product-title">{{ $product->title }}</div>
						<div class="product-desc">{{ $product->description }}</div>
						
						<hr>
						<div class="product-price">$ {{ $product->price }}</div>
						<hr>
						<div class="btn-group cart">
							<button type="submit" class="btn btn-success">
								Add to cart 
							</button>
						</div>
						
					</div>
					<input type="hidden" name="id" value="{{ $product->id }}">
    				<input type="hidden" name="name" value="{{ $product->title }}">
    				<input type="hidden" name="price" value="{{ $product->price }}">
				</form>
				@endif
			</div>

@endsection


