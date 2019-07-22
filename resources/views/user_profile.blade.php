@extends('master')

@section('content')
<div class="container content">
	<h1 class="text-success">Profile</h1>
	<form method="post" action="{{ route('saveUserProfile') }}">
	@csrf
	@if(session('message'))
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
	@endif

	@if ($errors->any())
	    <div class="alert alert-danger">
	            @foreach ($errors->all() as $error)
	                <div>{{ $error }}</div>
	            @endforeach
	    </div>
	@endif
		<div class="col-sm-6">
			<div>
				<label>First name</label>
				<input type="text" name="first_name" class="form-control" value="{{ old('first_name', Auth::user()->first_name) }}">
			</div>
			<div>
				<label>Mobile</label>
				<input type="text" name="mobile" class="form-control" value="{{ old('mobile', Auth::user()->mobile) }}">
			</div>
			<div>
				<label>Address</label>
				<textarea type="text" name="address" class="form-control">{{ old('address', Auth::user()->fullAddress->count() ? Auth::user()->fullAddress->address : '' ) }}</textarea>
			</div>
		</div>
		<div class="col-sm-6">
			<div>
				<label>Last name</label>
				<input type="text" name="last_name" class="form-control" value="{{ old('last_name', Auth::user()->last_name) }}">
			</div>
			<div>
				<label>City</label>
				<input type="text" name="city" class="form-control" value="{{ old('city', Auth::user()->fullAddress ? Auth::user()->fullAddress->city : '') }}">
			</div>
			<div>
				<label>State</label>
				<input type="text" name="state" class="form-control" value="{{ old('state', Auth::user()->fullAddress ? Auth::user()->fullAddress->state : '') }}">
			</div>
			<div>
				<label>Pincode</label>
				<input type="text" name="pincode" class="form-control" value="{{ old('pincode', Auth::user()->fullAddress ? Auth::user()->fullAddress->pincode : '') }}">
			</div>
			<div>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</div>
	</form>
</div>

@endsection