@extends('admin.master')

@section('title')
	Ophidio: Order
@stop

@section('mainContent')

 	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">

	<section class="content">
                    <div class="row">

                    <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">User Details</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <p>
                                        <label>Name: </label>
                                        {{ $order->user->name }}
                                    </p>
                                    <p>
                                        <label>Address: </label>
                                        {{ $order->addresses->address }} {{ $order->addresses->city }} {{ $order->addresses->state }}
                                        <strong>{{ $order->addresses->pincode }}</strong>
                                    </p>
                                    <p>
                                        <label>Sub Total: </label>
                                        {{ $order->amount }}
                                    </p>
                                    <div>
                                        <div>Items</div>
                                        @if($order->items->count())
                                        <ul>
                                            @foreach($order->items as $item)
                                                <li> {{ $item->item }} X {{ $item->quantity }}  <strong>${{ $item->amount }}</strong>  </li>
                                            @endforeach
                                        </ul>    
                                        @endif
                                    </div>
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>   <!-- /.row -->
                </section>
            </aside><!-- /.right-side -->    
@stop	
