<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label for="username" class="col-md-3 control-label">User Name</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="username" value="{{ Request::old('username') ?: $user->username }}">
        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-3 control-label">Email</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="email" value="{{ Request::old('email') ?: $user->email }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
    <label for="first_name" class="col-md-3 control-label">First Name</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="first_name" value="{{ Request::old('first_name') ?: $user->first_name }}">
        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    <label for="last_name" class="col-md-3 control-label">Last Name</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="last_name" value="{{ Request::old('last_name') ?: $user->last_name }}">
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address" class="col-md-3 control-label">Address</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="address" value="{{ Request::old('address') ?: $user->address }}">
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-3 control-label">Password</label>
    <div class="col-md-8">
        <input type="password" class="form-control" name="password">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    <label for="password_confirmation" class="col-md-3 control-label">Confirm Password</label>
    <div class="col-md-8">
        <input type="password" class="form-control" name="password_confirmation">
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
</div>
