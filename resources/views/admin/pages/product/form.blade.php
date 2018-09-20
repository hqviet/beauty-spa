@extends('admin.layout.app')
@section('title', 'Product')
@section('left_side_bar')
@include('admin.layout.left_side_bar', ['active' => 'product'])
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product
            <small>{{ $role }} product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Product</li>
            <li class="active">{{ $role }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('add_product'))
                <div class="alert alert-{{ Session::get('add_product')['status'] }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fa fa-check"></i>{{ Session::get('add_product')['message'] }} </h5>
                </div>
                @endif
                <div class="box box-primary">
                    <form role="form" method="post" action="{{ route('admin.product.add.handle') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        @if ($id)
                        <input type="hidden" name="id-en" value="{{ $id_en }}">
                        @endif
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="">Name</label>
                                    <input class="form-control" name="name" type="text" value="{{ old('name') }}" required="true">
                                    @if ($errors->has('name'))
                                    <small class="help-block">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-sm-6 {{ $errors->has('brand') ? 'has-error' : '' }}">
                                    <label>Brand</label>
                                    <select name="brand" class="form-control">
                                        <option value="{{ old('brand') }}">-- Choose a brand --</option>
                                        @forelse ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @if ($errors->has('brand'))
                                    <small class="help-block">{{ $errors->first('brand') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-md-3 col-sm-6 {{ $errors->has('category') ? 'has-error' : '' }}">
                                    <label>Category</label>
                                    <select name="category" class="form-control" value="{{ old('category') }}">
                                        <option value="">-- Choose a category --</option>
                                        @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @if ($errors->has('category'))
                                    <small class="help-block">{{ $errors->first('category') }}</small>
                                    @endif
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-3 col-sm-6 form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                    <label for="">Price</label>
                                    <input class="form-control" type="text" name="price" value="{{ old('price') }}" required="true">
                                    @if ($errors->has('price'))
                                    <small class="help-block">{{ $errors->first('price') }}</small>
                                    @endif
                                </div>

                                <div class="col-md-3 col-sm-6 form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                                    <label for="">Quantity</label>
                                    <input class="form-control" type="number" name="quantity" value="{{ old('quantity') }}" required="true">
                                    @if ($errors->has('quantity'))
                                    <small class="help-block">{{ $errors->first('quantity') }}</small>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-12 form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                    <label for="">Image</label>
                                    <input class="form-control" type="file" name="image" required="true">
                                    @if ($errors->has('image'))
                                    <small class="help-block">{{ $errors->first('image') }}</small>
                                    @endif
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-6 form-group {{ $errors->has('desc_en') ? 'has-error' : '' }}">
                                        <label for="">Description</label>
                                        <textarea class="form-control" name="desc_en" rows="6" required="true">
                                            {{ old('desc_en') }}
                                        </textarea>
                                        @if ($errors->has('desc_en'))
                                        <small class="help-block">{{ $errors->first('desc_en') }}</small>
                                        @endif
                                    </div>
                                    <div class="col-md-6 form-group {{ $errors->has('desc_vi') ? 'has-error' : '' }}">
                                        <label for="">Description (Vietnames - optional)</label>
                                        <textarea class="form-control" name="desc_vi" rows="6"></textarea>
                                        @if ($errors->has('description'))
                                        <small class="help-block">{{ $errors->first('desc_vi') }}
                                            {{ old('desc_vi') }}
                                        </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="btn btn-success" type="submit" name="create_btn" value="Add new product">

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                    </form>
                </div>

                <!-- general form elements -->
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
@endsection
