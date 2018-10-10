@extends('admin.layout.app')
@section('title', 'Order')
@section('left_side_bar')
@include('admin.layout.left_side_bar', ['active' => 'order'])
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order
            <small>{{ $role }} order</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Order</li>
            <li class="active">{{ $role }}</li>
        </ol>
    </section>

    <!-- Main content -->
    
    <section class="content">
       
        <!-- Small boxes (Stat box) -->
        <div class="row">
            {{ dd($order) }}
            <form role="form" action="" method="post">
                {!! csrf_field() !!}
               
                <div class="col-md-6 col-sm-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Quick Example</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 {{ $errors->has('brand') ? 'has-error' : '' }}">
                                        <label>Brand</label>
                                        
                                       
                                    </div>
                                </div>
                    <input class="btn btn-success" type="submit" name="product_form_btn" value="{{ $id ? 'Update product' : 'Add new product' }}">

                            </div>
                        </div>
                    </div>
                </div>
                
                
            </form>
            <!-- ./col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
@endsection
