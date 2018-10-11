<div class="tab-pane" id="timeline">
    <!-- The timeline -->
    <form class="form-horizontal" method="POST" action="{{ route('admin.profile.change-password') }}">
        @csrf
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Current password <span class="text-danger">*</span></label>
            <div class="col-sm-10 {{$errors->has('password')? 'has-error' : ''}}">
                <input type="password" class="form-control" id="password" name="password" required>
                <span class="help-block">{{$errors->has('password')? $errors->first('password') : ''}}</span>
            </div>
        </div>

        <div class="form-group">
            <label for="new_password" class="col-sm-2 control-label">New password <span class="text-danger">*</span></label>
            <div class="col-sm-10 {{$errors->has('new_password')? 'has-error' : ''}}">
                <input type="password" class="form-control" id="new_password" name="new_password" required>
                <span class="help-block">{{$errors->has('new_password')? $errors->first('new_password') : ''}}</span>
            </div>
        </div>

        <div class="form-group">
            <label for="confirm_password" class="col-sm-2 control-label">New password (re-enter) <span class="text-danger">*</span></label>
            <div class="col-sm-10 {{$errors->has('confirm_password')? 'has-error' : ''}}">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                <span class="help-block">{{$errors->has('confirm_password')? $errors->first('confirm_password') : ''}}</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </form>
</div>
