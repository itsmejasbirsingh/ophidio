@extends('admin.master')

@section('title')
	Ophidio: Add Role
@stop

@section('mainContent')

 	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            {{ 'edit' === $activeLink ? 'Edit' : 'Add' }} User
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	            <li class="active">{{ 'edit' === $activeLink ? 'Edit' : 'Add' }} User</li>
	        </ol>
	    </section>

	<section class="content">
                    <div class="row">

                    <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">User Details</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form" method="post" action="{{ route('saveRole') }}">
                                    {!! csrf_field() !!}
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Role</label>
                                            <input type="text" class="form-control {{ $errors->has('role') ? 'o-danger' : '' }}" name="role" placeholder="Enter user role" value="{{ old('role', @$user->role) }}">
                                            <span class="o-error">{{ $errors->has('role') ? $errors->first('role') : '' }}</span>
                                        </div>
                                        
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        
                       
                    </div>   <!-- /.row -->
                </section>
            </aside><!-- /.right-side -->    
@stop	
