@extends('admin.layout.app')
@section('title', 'User')
@section('left_side_bar')
@include('admin.layout.left_side_bar', ['active' => 'user'])
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>{{ $role }} user</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">User</li>
            <li class="active">{{ $role }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if (Session::has('add_user'))
        <div class="alert alert-{{ Session::get('add_user')['status'] }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i>{{ Session::get('add_user')['message'] }} </h5>
        </div>
        @endif
        @if (Session::has('update_user'))
        <div class="alert alert-{{ Session::get('update_user')['status'] }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i>{{ Session::get('update_user')['message'] }} </h5>
        </div>
        @endif
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ $action == 'create' ? route('admin.user.add.handle') : route('admin.user.edit.handle') }}">
                @csrf
                @if ($id)
                <input type="hidden" name="id" value="{{ $id }}">
                @endif
                <div class="box-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12 {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"
                                    value="{{ $id ? $user->email : old('email') }}" {{ $id ? 'readonly' : '' }}>
                                @if ($errors->has('email'))
                                <small class="text-danger">{{
                                    $errors->first('email') }}</small>
                                @endif
                            </div>
                            @if ($action == 'create')
                            <div class="form-group col-md-6 col-sm-12 {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                @if ($errors->has('password'))
                                <small class="text-danger">{{
                                    $errors->first('password') }}</small>
                                @endif
                            </div>
                            @endif
                            <div class="form-group col-md-6 col-sm-12 {{ $errors->has('firstname') ? 'has-error' : '' }}">
                                <label for="firstname">First name</label>
                                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First name"
                                    value="{{ $id ? $user->first_name : old('firstname') }}">
                                @if ($errors->has('firstname'))
                                <small class="text-danger">{{
                                    $errors->first('firstname') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6 col-sm-12 {{ $errors->has('lastname') ? 'has-error' : '' }}">
                                <label for="lastname">Last name</label>
                                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last name"
                                    value="{{ $id ? $user->last_name : old('lastname') }}">
                                @if ($errors->has('lastname'))
                                <small class="text-danger">{{
                                    $errors->first('lastname') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6 col-sm-12 {{ $errors->has('address') ? 'has-error' : '' }}">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="Address"
                                    value="{{ $id ? $user->address : old('address') }}">
                                @if ($errors->has('address'))
                                <small class="text-danger">{{
                                    $errors->first('address') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6 col-sm-12 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone number"
                                    value="{{ $id ? $user->phone : old('phone') }}">
                                @if ($errors->has('phone'))
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                                @endif
                            </div>
                            @if ($isAdmin)
                            <div class="form-group col-md-6">
                                <label>Role</label>
                                <select class="form-control" name="role">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->slug }}" @if ($id && $role->slug == $user->r_slug) selected
                                        @endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">{{ !$id ? 'Create new user' : 'Update user' }}</button>
                </div>
            </form>
        </div>
    </section>

    <!-- /.content -->
</div>
@endsection
