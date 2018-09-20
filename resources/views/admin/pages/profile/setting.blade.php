<div class="tab-pane active" id="settings">

    <form class="form-horizontal" method="POST" action="{{ route('admin.profile.post') }}">

        @include('admin.pages.common.message')

        @csrf
        <div class="form-group">
            <label for="first_name" class="col-sm-2 control-label">Firts Name</label>
            <div class="col-sm-10 {{$errors->has('first_name')? 'has-error' : ''}}">
                <input type="text" class="form-control" id="first_name"
                       placeholder="First Name" name="first_name" value="{{ $authUser->first_name }}">
                <span class="help-block">{{$errors->has('first_name')? $errors->first('first_name') : ''}}</span>
            </div>
        </div>

        <div class="form-group">
            <label for="last_name" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10 {{$errors->has('last_name')? 'has-error' : ''}}">
                <input type="text" class="form-control" id="last_name"
                       placeholder="Last Name" name="last_name" value="{{ $authUser->last_name }}">
                <span class="help-block">{{$errors->has('last_name')? $errors->first('last_name') : ''}}</span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email <span class="text-danger">*</span></label>

            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                       name="email" value="{{ $authUser->email }}" required readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-10 {{$errors->has('phone')? 'has-error' : ''}}">
                <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ $authUser->phone }}">
                <span class="help-block">{{$errors->has('phone')? $errors->first('phone') : ''}}</span>
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10 {{$errors->has('address')? 'has-error' : ''}}">
                <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ $authUser->address }}">
                <span class="help-block">{{$errors->has('address')? $errors->first('address') : ''}}</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </form>
</div>
