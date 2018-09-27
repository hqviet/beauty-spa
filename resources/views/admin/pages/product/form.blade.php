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
            <div class="col-md-6 col-sm-12">
                @if (Session::has('add_product'))
                <div class="alert alert-{{ Session::get('add_product')['status'] }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fa fa-check"></i>{{ Session::get('add_product')['message'] }} </h5>
                </div>
                @endif
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quick Example</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                            <form role="form">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-sm-12 {{ $errors->has('brand') ? 'has-error' : '' }}">
                                                <label>Brand</label>
                                                <select name="brand" class="form-control">
                                                    <option value="{{ old('brand') }}">-- Choose a brand --</option>
                                                    @forelse ($brands as $brand)
                                                    <option value="{{ $brand->id }}" @if ($id) @if($product->brand->id ==
                                                        $brand->id) {{ "selected" }} @endif @endif>{{ $brand->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                @if ($errors->has('brand'))
                                                <small class="help-block">{{ $errors->first('brand') }}</small>
                                                @endif
                                            </div>
            
                                            <div class="form-group col-md-6 col-sm-12 {{ $errors->has('category') ? 'has-error' : '' }}">
                                                <label>Category</label>
                                                <select name="category" class="form-control" value="{{ old('category') }}">
                                                    <option value="">-- Choose a category --</option>
                                                    @forelse ($categories as $category)
                                                    <option value="{{ $category->id }}" @if ($id) @if($product->category->id
                                                        ==
                                                        $category->id) {{ "selected" }} @endif @endif>{{ $category->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                @if ($errors->has('category'))
                                                <small class="help-block">{{ $errors->first('category') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                                <label for="">Price</label>
                                                <input class="form-control" type="text" name="price" value="{{ $id ? $product->price : old('price') }}"
                                                    required="true">
                                                @if ($errors->has('price'))
                                                <small class="help-block">{{ $errors->first('price') }}</small>
                                                @endif
                                            </div>
            
                                            <div class="col-md-6 col-sm-12 form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                                                <label for="">Quantity</label>
                                                <input class="form-control" type="number" name="quantity" value="{{ $id ? $product->quantity : old('quantity') }}"
                                                    required="true">
                                                @if ($errors->has('quantity'))
                                                <small class="help-block">{{ $errors->first('quantity') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                                <label for="">Image</label>
                                                @if ($id)
                                                <input class="form-control" type="file" name="image"
                                                    {{ $product->image ? '' : 'required' }} value="{{ $id ? $product->image : '' }}">
                                                <div>
                                                    @if ($product->image)
                                                    <br>
                                                    <img style="width:150px;" src="{{ asset('uploads/products/' . $product->image) }}"
                                                        alt="">
                                                    @else
                                                    <small class="text-maroon">(no image)</small>
                                                    @endif
                                                </div>
                                                @else
                                                <input class="form-control" type="file" name="image">
                                                @endif
                                                @if ($errors->has('image'))
                                                <small class="help-block">{{ $errors->first('image') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-sm-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        @foreach (config('app.locales') as $k => $v)
                        <li class="{{ $k == 'vi' ? 'active' : '' }}"><a href="#{{ $k }}" data-toggle="tab">{{ $v }}</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach (config('app.locales') as $k => $v)
                        <div class="tab-pane {{ $k == 'vi' ? 'active' : '' }}" id="{{ $k }}">
                            <form role="form" method="post" action="{{ $id ? route('admin.product.edit.handle') : route('admin.product.add.handle') }}"
                                enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                @if ($id)
                                <input type="hidden" name="id" value="{{ $id }}">
                                @endif
                                <input type="hidden" name="lang" value="{{ $k }}">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <label for="">Name</label>
                                            @if ($id)
                                            @foreach ($product->productTran as $p)
                                            @if ($p->lang == $k)
                                            @php
                                            $name = $p->name
                                            @endphp
                                            @endif
                                            @endforeach
                                            @else
                                            @php
                                            $name = old('name')
                                            @endphp
                                            @endif
                                            <input class="form-control" name="name" type="text" value="{{ $name }}"
                                                required="true">
                                            @if ($errors->has('name'))
                                            <small class="help-block">{{ $errors->first('name') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 form-group {{ $errors->has('desc_en') ? 'has-error' : '' }}">
                                            <label for="">Description</label>
                                            @if ($id)
                                            @foreach ($product->productTran as $p)
                                            @if ($p->lang == $k)
                                            @php
                                            $desc = $p->description
                                            @endphp
                                            @endif
                                            @endforeach
                                            @else
                                            @php
                                            $desc = old('name')
                                            @endphp
                                            @endif
                                            <textarea class="form-control" name="description" rows="6" required="true">{{ $desc }}</textarea>
                                            @if ($errors->has('desc_en'))
                                            <small class="help-block">{{ $errors->first('description') }}</small>
                                            @endif
                                        </div>
                                    </div>                                 
                                </div>
                                <!-- /.box-body -->
                            </form>
                        </div>
                        @endforeach
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
            <div class="col-sm-12">
                <input class="btn btn-success" type="submit" name="product_form_btn" value="{{ $id ? 'Update product' : 'Add new product' }}">
                </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
@endsection
