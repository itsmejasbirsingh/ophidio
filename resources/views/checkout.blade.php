@extends('master')

@section('content')
<div class="container content">

@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
    </div>
@endif

<form method="post" action="{{ route('order') }}">
	@csrf

<div class="col-sm-2">
	@if( Auth::user()->allAddresses->count() )
	<h4>Saved addresses</h4>
	<ul class="list-group saved-addresses">
		@foreach( Auth::user()->allAddresses as $address )
			<li class="list-group-item address">
				<span class="body">{{ $address->address }}</span>
				<span class="state">{{ $address->state }}</span>
				<span class="city">{{ $address->city }}</span>
				<span class="pincode">{{ $address->pincode }}</span>
			</li>
		@endforeach
	</ul>
	@endif
</div>	
<div class="col-sm-5">
	<h3>BILLING DETAILS</h3>

	<div>
		<label>
			First name:
		</label>
		<input type="text" class="form-control" name="first_name" value="{{ old('first_name', Auth::user()->first_name) }}">
	</div>
	<div>
		<label>
			Last name:
		</label>
		<input type="text" class="form-control" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}">
	</div>
	<div>
		<label>
			Email:
		</label>
		<input type="text" class="form-control" name="email_id" value="{{ old('email_id', Auth::user()->email) }}">
	</div>
	<div>
		<label>
			Mobile:
		</label>
		<input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
	</div>
	<div>
		<label>
			Address:
		</label>
		<textarea class="form-control" name="address">{{ old('address') }}</textarea>
	</div>
	<div>
		<label>
			City:
		</label>
		<input type="text" class="form-control" name="city" value="{{ old('city') }}">
	</div>
	<div>
		<label>
			State:
		</label>
		<input type="text" class="form-control" name="state" value="{{ old('state') }}">
	</div>
	<div>
		<label>
			Pincode:
		</label>
		<input type="text" class="form-control" name="pincode" value="{{ old('pincode') }}">
	</div>
	
	
</div>
<div class="col-sm-5">
	<h3>Your order</h3>

	@if (sizeof(Cart::content()) > 0)
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Product</th>
					<th>Total</th>
				</tr>
			</thead>
			<body>
				@foreach (Cart::content() as $item)
				<tr>
					<td class="order"><strong>{{ $item->name }}</strong> X {{ $item->qty }}</td>
					<td class="order">${{ $item->price * $item->qty }}</td>
				</tr>
				@endforeach
					<tr>
                        <td>Subtotal</td>
                        <td>${{ Cart::instance('default')->subtotal() }}</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>${{ Cart::instance('default')->tax() }}</td>
                    </tr>
				<tr class="border-bottom">
         
                    <td>Total</td>
                    <td class="table-bg">${{ Cart::total() }}</td>
           
                </tr>
			</body>
		</table>
	</div>
	@endif

	<div class="payments">
		<p><input type="radio" name="" checked="checked" value="cod"> Cash on delivery</p>
	</div>

	<input type="submit" name="" value="Place Order" class="btn btn-success">
</div>

</form>

</div>	

@endsection