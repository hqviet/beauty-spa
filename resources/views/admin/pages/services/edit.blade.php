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
                <li class="active">Sevice</li>
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
                            <li class="">
                                <a href="#en" data-toggle="tab" aria-expanded="false">{{config('app.locales.en')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="vi">
                                <form class="form-horizontal" method="POST" action="{{ route('admin.service.update', $services->id) }}"
                                      enctype="multipart/form-data">
                                    @include('admin.pages.common.message')
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" value="vi" name="lang">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Danh mục <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="cat_id">
                                                @foreach($cate_service_translation as $cate)
                                                    @if($cate->lang == 'vi')
                                                        <option
                                                            value="{{ $cate->category_services_id }}"
                                                            @if ($cate->category_services_id == $services->categoryService->id)
                                                            selected="selected"
                                                            @endif>{{ $cate->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Tiêu đề <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('title')? 'has-error' : ''}}">
                                            <input type="text" class="form-control" id="title"
                                                   name="title" value="{{ $services->translation('vi')->name }}" required>
                                            <span
                                                class="help-block">{{$errors->has('title')? $errors->first('title') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Ảnh </label>
                                        <div class="col-sm-10 {{$errors->has('image')? 'has-error' : ''}}">
                                            <img src="{{ asset('assets/admin/image_service/'.$services->image)}}" alt="" style="width: 100px; margin-bottom: 20px">

                                            <input type="file" id="image" name="image">
                                            <span
                                                class="help-block">{{$errors->has('image')? $errors->first('image') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="short_description" class="col-sm-2 control-label">Mô tả ngắn <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('short_description')? 'has-error' : ''}}">
                                            <textarea class="ckeditor" name="short_description" rows="10"
                                                      id="short_description"  cols="80" required>{{ $services->translation('vi')->short_description }}</textarea>
                                            <span class="help-block">{{$errors->has('short_description')? $errors->first('short_description') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Nội dung <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('description')? 'has-error' : ''}}">
                                            <textarea class="ckeditor" name="description" rows="10"
                                                      cols="80" required>{{ $services->translation('vi')->description }}</textarea>
                                            <span
                                                class="help-block">{{$errors->has('description')? $errors->first('description') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="price" class="col-sm-2 control-label">Giá (VNĐ)<span class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('price')? 'has-error' : ''}}">
                                            <input type="text" class="form-control" id="price"
                                                   name="price" value="{{ $services->price }}" required>
                                            <span
                                                class="help-block">{{$errors->has('price')? $errors->first('price') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">Submit</button>

                                            <a href="{{ route('admin.service.index') }}"
                                               class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="en">
                                <!-- The timeline -->
                                <form class="form-horizontal" method="POST" action="{{ route('admin.service.update', $services->id) }}"
                                      enctype="multipart/form-data">
                                    @include('admin.pages.common.message')
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" value="en" name="lang">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Category <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 ">
                                            <select class="form-control select2" name="cat_id">
                                                @foreach($cate_service_translation as $cate)
                                                    @if($cate->lang == 'en')
                                                        <option
                                                            value="{{ $cate->category_services_id }}"
                                                            @if ($cate->category_services_id == $services->categoryService->id)
                                                            selected="selected"
                                                            @endif>{{ $cate->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Title <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('title')? 'has-error' : ''}}">
                                            <input type="text" class="form-control" id="title"
                                                   name="title" value="{{ isset($services->translation('en')->name)?$services->translation('en')->name:'' }}" required>
                                            <span
                                                class="help-block">{{$errors->has('title')? $errors->first('title') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Image <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('image')? 'has-error' : ''}}">
                                            <img src="{{ asset('assets/admin/image_service/'.$services->image) }}" alt="" style="width: 100px; margin-bottom: 20px">
                                            <input type="file" id="image" name="image">
                                            <span
                                                class="help-block">{{$errors->has('image')? $errors->first('image') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="short_description" class="col-sm-2 control-label">Short description <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('short_description')? 'has-error' : ''}}">
                                            <textarea class="ckeditor" name="short_description" rows="10"
                                                      id="short_description"  cols="80" required>{{ isset($services->translation('en')->short_description)?$services->translation('en')->short_description:'' }}</textarea>
                                            <span class="help-block">{{$errors->has('short_description')? $errors->first('short_description') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Description <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('description')? 'has-error' : ''}}">
                                            <textarea class="ckeditor" name="description" rows="10"
                                                      cols="80" required>{{ isset($services->translation('en')->description)?$services->translation('en')->description:'' }}</textarea>
                                            <span
                                                class="help-block">{{$errors->has('description')? $errors->first('description') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="price" class="col-sm-2 control-label">Price (VNĐ)<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-10 {{$errors->has('price')? 'has-error' : ''}}">
                                            <input type="text" class="form-control" id="price"
                                                   name="price" value="{{ $services->price }}" required>
                                            <span
                                                class="help-block">{{$errors->has('price')? $errors->first('price') : ''}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">Submit</button>

                                            <a href="{{ route('admin.service.index') }}"
                                               class="btn btn-danger">Cancel</a>
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
