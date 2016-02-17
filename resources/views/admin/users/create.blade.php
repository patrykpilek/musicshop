@extends('admin.layouts.default')

@section('content')
    <h1 class="page-header">All Users</h1>

    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3><a href="/admin/users">Users</a><small> &raquo; Create New User</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">New User Form</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/users') }}">
                            {!! csrf_field() !!}

                            @include('admin.users._form')

                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-plus-circle"></i>
                                        &nbsp; Add New User
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