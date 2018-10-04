@extends('admin.layout.app')
@section('name', 'Schedule')
@section('left_side_bar')
    @include('admin.layout.left_side_bar', ['active' => 'schedule'])
@endsection
@section('styles')
    {{--<link rel="stylesheet" href="{{ asset('assets/front/css/mycss.css') }}">--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1126px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Schedule
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Schedule</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#vi" data-toggle="tab" aria-expanded="true">{{config('app.locales.vi')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="vi">
                                <form class="form-horizontal" method="POST" action="{{ route('admin.schedule.update', $schedule->id) }}" enctype="multipart/form-data">
                                    @include('admin.pages.common.message')
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Dịch vụ <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="services_id">
                                                @foreach($services as $service)
                                                    <option value="{{ $service->id }}"
                                                            @if ($service->id == $schedule->services_id)
                                                    selected="selected"
                                                        @endif>{{ $service->s_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Họ Tên <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('name')? 'has-error' : ''}}">
                                            <input type="text" class="form-control" id="name"
                                                   name="name" value="{{ $schedule->name }}" >
                                            <span class="help-block">{{$errors->has('name')? $errors->first('name') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('email')? 'has-error' : ''}}">
                                            <input type="text" class="form-control" id="email"
                                                   name="email" value="{{ $schedule->email }}" >
                                            <span class="help-block">{{$errors->has('email')? $errors->first('email') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone" class="col-sm-2 control-label">Điện thoại <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('phone')? 'has-error' : ''}}">
                                            <input type="text" class="form-control" id="phone"
                                                   name="phone" value="{{ $schedule->phone }}" >
                                            <span class="help-block">{{$errors->has('phone')? $errors->first('phone') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="date" class="col-sm-2 control-label">Ngày hẹn <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('date')? 'has-error' : ''}}">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{ $schedule->date }}">
                                            </div>
                                            <span class="help-block">{{$errors->has('date')? $errors->first('date') : ''}}</span>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label for="message" class="col-sm-2 control-label">Nội dung </label>
                                        <div class="col-sm-10 {{$errors->has('message')? 'has-error' : ''}}">
                                            <textarea class="ckeditor" name="message" rows="10"
                                                      id="message"  cols="80">{{ $schedule->message }}</textarea>
                                            <span class="help-block">{{$errors->has('message')? $errors->first('message') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Trạng thái <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="status">
                                                @foreach(config('custom.status') as $key => $value)
                                                    <option value="{{ $key }}" @if($key == $schedule->status) selected="selected" @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">Submit</button>

                                            <a href="{{ route('admin.schedule.index') }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

@endsection
@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $('#datepicker').datepicker({
            autoclose: true,
            minDate: 0,
            dateFormat: 'yy-mm-dd'
        })
    </script>
@stop
