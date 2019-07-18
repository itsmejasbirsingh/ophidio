@extends('admin.master')

@section('title')
	Ophidio: All Orders
@stop

@section('mainContent')

 	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            All Orders
	            <small>List of all orders</small>
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	            <li class="active">All orders</li>
	        </ol>
	    </section>

    	<section class="content">
        
       <div class="box">
                                <div class="box-header">
                                                        
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row">
                                    
                                    <div class="col-xs-6"><div class="dataTables_filter" id="example1_filter">
                                    

                                    </div></div></div><table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 50px;">Sno</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 200px;">Name</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 200px;">Amount</th>
                                               
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 100px;">Status</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 171px;">Created at</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 171px;">Actions</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Sno</th>
                                                <th rowspan="1" colspan="1">Name</th>
                                                <th rowspan="1" colspan="1">Amount</th>
                                                <th rowspan="1" colspan="1">Status</th>
                                                <th rowspan="1" colspan="1">Created at</th>
                                                <th rowspan="1" colspan="1">Actions</th>
                                               
                                            </tr>
                                        </tfoot>
                                        @if($orders->count())
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                @foreach($orders as $key => $order)
                                                    <tr>
                                                        <td class="  sorting_1"> {{ ++$key }} </td>
                                                        <td class="  sorting_1"> {{ $order->name }} </td>
                                                        <td class="  sorting_1"> {{ $order->amount }} </td>
                                                        <td class="  sorting_1"> {!! $order->status ? '<span class="btn btn-success">Completed</span>' : '<span class="btn btn-danger">Processing</span>' !!} </td>
                                                        <td class="  sorting_1"> {{ $order->created_at }} </td>
                                                        <td class="  sorting_1"> 
                                                        <a href="{{ route('ordersView', $order->id) }}">View</a>
                                                        </td>
                                                        
                                                        
                                                        
                                                    </tr>
                                                @endforeach
                                            
                                            @else
                                                <tr> <td></td><td></td><td> No order found! </td><td></td><td></tr>
                                            </tbody>    
                                        @endif
                                    

                                            </table>

                                            

                                        </div>
                                </div><!-- /.box-body -->
                            </div>
        </section>
    </aside><!-- /.right-side -->    
@stop	
