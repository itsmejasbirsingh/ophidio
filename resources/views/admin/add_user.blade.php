@extends('admin.master')

@section('title')
	Ophidio: Add User
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
                                    <form role="form" method="post" action="{{ 'edit' === $activeLink ? route('updateUser', $user->id) : route('saveUser') }}">
                                    @csrf
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control @error('username') o-danger-border @enderror" name="username" placeholder="Enter user name" value="{{ old('username') }}{{ ! empty( $user->name ) ? $user->name : '' }}">
                                            @error('username')
                                                <span class="o-error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="first_name" placeholder="Enter first name" value="{{ old('first_name') }}{{ ! empty( $user->first_name ) ? $user->first_name : '' }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name" placeholder="Enter last name" value="{{ old('last_name') }}{{ ! empty( $user->last_name ) ? $user->last_name : '' }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control {{ $errors->has('email') ? 'o-danger-border' : '' }}" name="email" placeholder="Enter Email Address" value="{{ old('email') }}{{ ! empty( $user->email ) ? $user->email : '' }}">
                                            <span class="o-error">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" name="role">
                                                @foreach( $userRoles as $role )
                                                    <option {{ ! empty( old('role') ) && old('role') == $role->id ? 'selected' : '' }}{{ ! empty( $user->role_id ) && $user->role_id === $role->id ? 'selected' : '' }}  value="{{ $role->id }}">{{ $role->role }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control {{ $errors->has('password') ? 'o-danger-border' : '' }}" name="password" placeholder="Enter Password">
                                            <span class="o-error">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control {{ $errors->has('password') ? 'o-danger-border' : '' }}" name="password_confirmation" placeholder="Confirm Password">
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
