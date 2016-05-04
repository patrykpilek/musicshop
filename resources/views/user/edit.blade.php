@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Your Details</h1>
        </div>
        <small>
            <ins><a href="{{ url('/home') }}">Home</a></ins>&nbsp;
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>&nbsp;
            <ins><a href="{{ url('/user') }}">Your Account</a></ins>&nbsp;
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><strong>Your Details</strong>
        </small>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Profile Photo</h3>
                    </div>
                    <div class="panel-body">
                        <p class="text-center">
                            @if(Storage::disk('local')->has($user->id .'-image.jpg'))
                                <img class="img-thumbnail" src="{{ url('user/image/'. $user->id .'-image.jpg') }}" >
                                {{--<img class="img-thumbnail" src="{{ route('user.image', ['id' => $user->id .'-image.jpg' ]) }}" >--}}
                            @else
                                <img class="img-thumbnail" src="{{ Auth::user()->getAvatar() }}" >
                            @endif

                        </p>
                        <p class="text-center">
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-file-upload">
                                <i class="fa fa-upload"></i> Select new photo
                            </button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Update your profile</h3>
                    </div>
                    <div class="panel-body">

                        @include('layouts.partials.errors')
                        @include('layouts.partials.success')

                        <form class="form-horizontal" role="form" method="post" action="/user/edit/{{ $user->id }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input type="text" id="username" class="form-control" name="username" value="{{ Request::old('username') ?: $user->username }}">

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">User Email</label>

                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email" value="{{ Request::old('email') ?: $user->email }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input type="text" id="first_name" class="form-control" name="first_name" value="{{ Request::old('first_name') ?: $user->first_name }}">

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input type="text" id="last_name" class="form-control" name="last_name" value="{{ Request::old('last_name') ?: $user->last_name }}">

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-save"></i>
                                        &nbsp; Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Upload File Modal --}}
    <div class="modal fade" id="modal-file-upload">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="/user/uploadAvatar/{{ $user->id }}" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">Upload New File</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">
                                File
                            </label>
                            <div class="col-sm-8">
                                <input type="file" id="file_name" name="file_name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Upload File
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection