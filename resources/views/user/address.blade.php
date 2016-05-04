@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Edit Your Addresses</h1>
        </div>
        <small>
            <ins><a href="{{ url('/home') }}">Home</a></ins>&nbsp;
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>&nbsp;
            <ins><a href="{{ url('/user') }}">Your Account</a></ins>&nbsp;
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <strong>Edit Your Addresses</strong>
        </small>
        <hr>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Your Addresses</h3>
                    </div>
                    <div class="panel-body">

                        @include('layouts.partials.errors')
                        @include('layouts.partials.success')

                        <form class="form-horizontal" role="form" method="post" action="/user/updateAddress/{{ $user->id }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" value="{{ $user->address }}">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-save"></i>&nbsp; Update
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection