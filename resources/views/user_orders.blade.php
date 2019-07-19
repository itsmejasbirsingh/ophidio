@extends('master')

@section('content')
<div class="container content">
	<h1 class="text-success">My Orders</h1>

	@if($orders->count())
	<table class="table table-striped">
		<tr>
			<th>Sno</th>
			<th>Item</th>
			<th>Item name</th>
			<th>Quantity</th>
			<th>Amount</th>
		</tr>
		@foreach($orders as $key => $order)
			
				
				<tr>
					<td>{{++$key}}</td>
					<td>
						<a href="{{ route('product_single', $order->item) }}">
							<img width="50px" src="{{ asset('/img/products/'.$order->featured_image) }}">
						</a>
					</td>
					<td>{{ $order->item }}</td>
					<td>{{ $order->quantity }}</td>
					<td>${{ $order->amount }}/-</td>
				</tr>
			
		@endforeach
		</table>
	@else
	<div class="alert alert-danger">
		No orders has been placed :(
	</div>	
	@endif
</div>

@endsection