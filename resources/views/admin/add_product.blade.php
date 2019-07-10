@extends('admin.master')

@section('title')
	Ophidio: Add Product
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
                    @if (session('productAddStatus'))
                        <div class="alert alert-success">
                            {{ session('productAddStatus') }}
                        </div>
                    @endif
                    <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Product Details</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form" method="post" action="{{ 'edit' === $activeLink ? route('updateProduct', $product->id) : route('saveProduct') }}" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Product name</label>
                                            <input type="text" class="form-control {{ $errors->has('title') ? 'o-danger-border' : '' }}" name="title" placeholder="Enter product title" value="{{ old('title') }}">
                                            <span class="o-error">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Product description</label>
                                            <textarea type="text" class="form-control {{ $errors->has('description') ? 'o-danger' : '' }}" name="description" placeholder="Enter product description">{{ old('description') }}</textarea>
                                            <span class="o-error">{{ $errors->has('username') ? $errors->first('username') : '' }}</span>
                                        </div>

                                         <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category">
                                                @foreach( $categories as $category )
                                                    <option {{ ! empty( old('category') ) && old('category') == $category->id ? 'selected' : '' }}  value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="form-control {{ $errors->has('price') ? 'o-danger-border' : '' }}" name="price" placeholder="Enter product price" value="{{ old('price') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Featured image</label>
                                            <input type="file" name="featured_image">
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
