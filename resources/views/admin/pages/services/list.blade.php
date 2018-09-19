@extends('admin.layout.app')
@section('title', 'Sevice')
@section('left_side_bar')
@include('admin.layout.left_side_bar', ['active' => 'service'])
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 1126px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sevice
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sevice List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('admin.service.create') }}" class="btn btn-primary text-right">Create new
                            service</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('admin.pages.common.message')
                        <table id="service_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Title </th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Price (VNĐ)</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 0)
                                @foreach($services as $service)
                                @php($i++)
                                <tr>
                                    <td>{!! $i !!}</td>
                                    <td>{!! $service->cst_name !!}</td>
                                    <td>{!! $service->s_name !!}</td>
                                    <td><img src="{{ asset('assets/admin/image_service') }}/{{$service->image}}" width="100px"></td>
                                    <td>{!! $service->description !!}</td>
                                    <td>{!! $service->price !!}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.service.edit',$service->id) }}" class="btn btn-warning"
                                            title="Edit">
                                            <i class="fa fa-pencil-square-o"></i></a>
                                        <button class="btn btn-danger delete" data_id="{{ $service->id }}" data-name="{{ $service->s_name }}"
                                            title="Delete">
                                            <i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection

@section('modal')
<div id="deleteModal" class="modal fade" role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.service.delete') }}" method="POST" id="frm_delete">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <div class="modal-header">
                    <h4 class="modal-title">DELETE</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to permenantly delete <span class="text-danger" id="alert"></span>?!</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="" id="delete_id">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
    
    $('.delete').on('click', function () {
        $('#delete_id').val($(this).attr('data_id'));
        $('#alert').text($(this).data('name'));
        $('#deleteModal').modal();
    });
    
    $(function () {
        $('#service_table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        });
    });
</script>

@stop
