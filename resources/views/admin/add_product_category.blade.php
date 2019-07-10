@extends('admin.master')

@section('title')
	Ophidio: Add Product category
@stop

@section('mainContent')

 	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            {{ 'edit' === $activeLink ? 'Edit' : 'Add' }} Role
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	            <li class="active">{{ 'edit' === $activeLink ? 'Edit' : 'Add' }} Role</li>
	        </ol>
	    </section>

	<section class="content">
                    <div class="row">

                    <div class="col-md-6">

                    @if (session('productCategoryAddStatus'))
                        <div class="alert alert-success">
                            {{ session('productCategoryAddStatus') }}
                        </div>
                    @endif
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Product category details</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form" method="post" action="{{ route('saveCategory') }}">
                                    {!! csrf_field() !!}
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Product category</label>
                                            <input type="text" class="form-control {{ $errors->has('role') ? 'o-danger' : '' }}" name="category" placeholder="Enter product category" value="{{ old('category', @$product->category) }}">
                                            <span class="o-error">{{ $errors->has('category') ? $errors->first('category') : '' }}</span>
                                        </div>
                                        
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                             <div class="col-md-6">

                            <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 50px;">Sno</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 312px;">Role</th>
                                                
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 171px;">Updated at</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Sno</th>
                                                <th rowspan="1" colspan="1">Role</th>
                                                <th rowspan="1" colspan="1">Updated at</th>
                                                
                                            </tr>
                                        </tfoot>
                                        @if($categories->count())
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                @foreach($categories as $key => $category)
                                                    <tr class="user-row">
                                                        <td class="  sorting_1"> {{ ++$key }} </td>
                                                        <td class="  sorting_1"> <span>{{ $category->name }}</span> 
                                                            <div>
                                                                <form method="post" class="update-product-category-form" action="{{ route('updateCategory',$category->id) }}">
                                                                    {!! csrf_field() !!}
                                                                    
                                                                    <div class="o-error update-role-error"></div>
                                                                </form>
                                                            </div>
                                                        </td>
                                                        <td class="role-updated-at"> {{ $category->updated_at }} </td>
                                                        
                                                    </tr>
                                                @endforeach
                                            
                                            @else
                                                <tr> <td></td><td></td><td> No user found! </td><td></td><td></td><td></td> </tr>
                                            </tbody>    
                                        @endif
                                            </table>
                        
                        </div>
                        
                       
                    </div>   <!-- /.row -->
                </section>
            </aside><!-- /.right-side -->   
@stop	
