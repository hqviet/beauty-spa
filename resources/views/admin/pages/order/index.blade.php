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
            <small>List order</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">List order</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                @if ($errors->has('order_id'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-check"></i>{{ $errors('order_id')->first() }}
                </div>
                @endif
                @if (Session::has('delete_order'))
                <div class="alert alert-{{ Session::get('delete_order')['status'] == 'success' ? 'success' : 'danger' }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-check"></i>
                    {{ Session::get('delete_order')['message'] }}
                </div>
                @endif
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="user_table" class="table table-bordered table-hover dataTable" role="grid"
                                        aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Phone</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($list as $order)
                                            <tr class="text-center">
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>@if ($order->status == 0) Pending @elseif ($order->status == 1) Delivering @else Done @endif</td>
                                                <td>
                                                    @if ($order->status == 0)
                                                    <a href="#" class="btn btn-success check_btn" data-message="Are you sure you want to check order no." data-toggle="modal" data-target="#check_dialog" data-id="{{ $order->id }}">Check</a>
                                                    @endif
                                                    {{-- <a href="" class="btn btn-info">Edit</a> --}}
                                                    <a href="#" class="btn btn-danger delete_btn"
                                                    data-message="Are you sure you want to permenantly delete order no." data-id="{{ $order->id }}" data-toggle="modal" data-target="#delete_dialog">Delete</a>
                                                </td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">Name</th>
                                                <th rowspan="1" colspan="1">Phone</th>
                                                <th rowspan="1" colspan="1">Status</th>
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
<div class="modal fade" id="check_dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Confirm before checking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.order.check.handle') }}" method="post">
            <div class="modal-body">
                <p>Are you sure you want to change the status of order no.<span id="check_order"></span>?</p>
                <select class="form-control" name="order_status" id="">
                    <option value="0">Pending</option>
                    <option value="1">Delivering</option>
                    <option value="2">Done</option>
                </select>
            </div>
            <div class="modal-footer">
                {!! csrf_field() !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input type="hidden" name="order_id" id="check_order_id" value="">
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="delete_dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm before deleting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to permenantly delete order no.<span id="delete_order"></span>?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.order.delete.handle') }}" method="post">
                    {!! csrf_field() !!}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="order_id" id="delete_order_id" value="">
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $(function () {
            $('#user_table').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true
            });
        });

        $('.delete_btn').click(function () {
            $('#delete_order').text($(this).data('id'));
            $('#delete_order_id').val($(this).data('id'));
        });

        $('.check_btn').click(function() {
            $('#check_order').text($(this).data('id'));
            $('#check_order_id').val($(this).data('id'));
        });

    });
</script>

@endsection
