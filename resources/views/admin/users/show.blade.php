@extends('admin.layouts.default')

@section('content')
    <h1 class="page-header">All Users</h1>
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3><a href="/admin/users">Users</a><small> &raquo; {{ $user->username }}</small></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">User - Profile Photo</h3>
                    </div>
                    <div class="panel-body">
                        <p class="text-center">
                            @if(Storage::disk('local')->has($user->id .'-image.jpg'))
                                <img class="img-thumbnail" src="{{ url('user/image/'. $user->id .'-image.jpg') }}" >
                            @else
                                <img class="img-thumbnail" src="{{ Auth::user()->getAvatar() }}" >
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">User Details</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-4 control-label">User Name</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{ $user->username }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">First Name</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{ $user->first_name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Last Name</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{ $user->last_name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{ $user->address }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Created At</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{ $user->created_at }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Updated At</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{ $user->updated_at }}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <a class="btn btn-primary btn-lg btn-block" href="{{ URL::previous() }}" role="button">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Previous Page
                </a>
            </div>
        </div>
    </div>
@endsection