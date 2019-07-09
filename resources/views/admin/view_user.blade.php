@extends('admin.master')

@section('title')
	Ophidio: View user
@stop

@section('mainContent')

 	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            {{ 'view' === $activeLink ? 'View' : 'Add' }} User
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	            <li class="active">{{ 'view' === $activeLink ? 'View' : 'Add' }} User</li>
	        </ol>
	    </section>

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
                                        <label>Name: </label> {{ $user->name }}
                                    </p>
                                    <p>
                                        <label>Email: </label> {{ $user->email }}
                                    </p>
                                    <p>
                                        <label>Role: </label> {{ $role->role }}
                                    </p>
                                    <p>
                                        <form method="post" action="{{ $user->status === 1 ? route('deactivateUser', $user->id) : route('activateUser', $user->id) }}">
                                            {!! csrf_field() !!}
                                            <button class="{{ $user->status === 1 ? 'o-danger-border' : 'o-success-border' }}">{{ $user->status === 1 ? "Deactivate User" : "Activate User" }}</button>
                                        </form>
                                    </p>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>   <!-- /.row -->
                </section>
            </aside><!-- /.right-side -->    
@stop	
