@extends('admin.master')

@section('title')
	Ophidio: All Users
@stop

@section('mainContent')

 	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            All users
	            <small>List of all users</small>
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	            <li class="active">All users</li>
	        </ol>
	    </section>

    	<section class="content">
        @if (session('userUpdateStatus'))
            <div class="alert alert-success">
                {{ session('userUpdateStatus') }}
            </div>
        @endif
         @if (session('userAddSession'))
            <div class="alert alert-success">
                {{ session('userAddSession') }}
            </div>
        @endif
        @if (session('userDeactivateStatus'))
            <div class="alert alert-danger">
                {{ session('userDeactivateStatus') }}
            </div>
        @endif
        @if (session('userActivateStatus'))
            <div class="alert alert-success">
                {{ session('userActivateStatus') }}
            </div>
        @endif
       <div class="box">
                                <div class="box-header">
                                                        
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row">
                                    <div class="col-xs-6">
                                        <form action="{{ route('listUsers') }}">
                                            <label>Search: <input type="text" aria-controls="example1" name="s" value="{{ app('request')->input('s') }}" placeholder="Name/Email"></label>
                                        </form>
                                    </div>
                                    <div class="col-xs-6"><div class="dataTables_filter" id="example1_filter">
                                    

                                    </div></div></div><table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 50px;">Sno</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 200px;">Name</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 171px;">Email</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 171px;">Role</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 100px;">Status</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 171px;">Updated at</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 171px;">Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Sno</th>
                                                <th rowspan="1" colspan="1">Name</th>
                                                <th rowspan="1" colspan="1">Email</th>
                                                <th rowspan="1" colspan="1">Role</th>
                                                <th rowspan="1" colspan="1">Status</th>
                                                <th rowspan="1" colspan="1">Updated at</th>
                                                <th rowspan="1" colspan="1">Action</th>
                                            </tr>
                                        </tfoot>
                                        @if($users->count())
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                @foreach($users as $key => $user)
                                                    <tr>
                                                        <td class="  sorting_1"> {{ ++$key }} </td>
                                                        <td class="  sorting_1"> {{ $user->name }} </td>
                                                        <td class=" "> {{ $user->email }} </td>
                                                        <td class=" "> {{ $user->role }} </td>
                                                        <td class=" "> {{ 1 === $user->status ? 'Active' : 'Inactive' }} </td>
                                                        <td class=" "> {{ $user->updated_at }} </td>
                                                        <td class="edit-user"> 
                                                            <a href="{{route('editUser', $user->id)}}">Edit</a> | 
                                                            <a href="{{route('viewUser', $user->id)}}">View</a> |
                                                            <form class="activate-deactivate-user-form" method="post" action="{{ $user->status === 1 ? route('deactivateUser', $user->id) : route('activateUser', $user->id) }}">
                                                                @csrf
                                                                <a class="activate-deactivate-user {{ $user->status === 1 ? 'o-error' : 'o-success' }}" href="{{ $user->status === 1 ? route('deactivateUser', $user->id) : route('activateUser', $user->id) }}">{{ $user->status === 1 ? "Deactivate" : "Activate" }}</a>
                                                            </form> 
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            
                                            @else
                                                <tr> <td></td><td></td><td> No user found! </td><td></td><td></td><td></td> </tr>
                                            </tbody>    
                                        @endif
                                    

                                            </table>

                                            @if($users->count())
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <div class="dataTables_info" id="example1_info">
                                                            Showing 1 to {{ $users->count() }}  of {{ $totalUsers }} entries
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="dataTables_paginate paging_bootstrap">
                                                            {{ $users->render() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                </div><!-- /.box-body -->
                            </div>
        </section>
    </aside><!-- /.right-side -->    
@stop	
