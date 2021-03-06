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
            <small>List product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">List product</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('update_product')) 
                <div class="alert alert-{{ Session::get('update_product')['status'] }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-check"></i>{{ Session::get('update_product')['message'] }}</div>
                @endif
                @if (Session::has('delete_product'))
                <div class="alert alert-{{ Session::get('delete_product')['status'] == 'success' ? 'success' : 'danger' }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-check"></i>
                    {{ Session::get('delete_product')['message'] }}
                </div>
                @endif
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="product_table" class="table table-bordered table-hover dataTable" role="grid"
                                        aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Slug</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Category</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Brand</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"colspan="1">Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @forelse ($products as $product)
                                                <tr class="text-center">
                                                    
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->slug }}</td>
                                                    <td>{{ $product->category->name }}</td>
                                                    <td>{{ $product->brand->name }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.product.edit.show', ['id' => $product->id]) }}" class="btn btn-info">Edit</a>
                                                        <a href="#" class="btn btn-danger delete_btn" data-name="{{ $product->name }}"
                                                            data-id="{{ $product->id }}" data-toggle="modal" data-target="#delete_dialog">Delete</a>
                                                    </td>
                                                </tr>
                                                @empty
                                                @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Image</th>
                                                <th rowspan="1" colspan="1">Name</th>
                                                <th rowspan="1" colspan="1">Brand</th>
                                                <th rowspan="1" colspan="1">Price</th>
                                                <th rowspan="1" colspan="1">Quantity</th>
                                                <th rowspan="1" colspan="1">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- general form elements -->
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="delete_dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm before delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to permenantly delete <span class="text-danger" id="product_name"></span>?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.product.delete.handle') }}" method="post">
                    {!! csrf_field() !!}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('.delete_btn').click(function () {
        $('#product_name').text($(this).data('name'));
        $('#delete_id').val($(this).data('id'));
    });
    
    $(function () {
        $('#product_table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        });
    });
</script>

@endsection
