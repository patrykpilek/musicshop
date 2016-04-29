@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Your Account</h1>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Profile</h3>
                    </div>
                    <div class="panel-body">
                        <p>Edit your name, email address</p><br>
                        <p class="text-center"><a class="btn btn-primary" href="/user/{{ Auth::user()->id }}/edit" role="button">Edit Your Details &raquo;</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Security</h3>
                    </div>
                    <div class="panel-body">
                        <p>Update password</p><br>
                        <p class="text-center"><a class="btn btn-primary" href="" role="button">Change password &raquo;</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <hr>
            </div>
            <div class="col-md-6">
                <hr>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Your Addresses</h3>
                    </div>
                    <div class="panel-body">
                        <p>Edit address</p><br>
                        <p class="text-center"><a class="btn btn-primary" href="#" role="button">Edit Your Address&raquo;</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Your Orders</h3>
                    </div>
                    <div class="panel-body">
                        <p>View your orders</p><br>
                        <p class="text-center"><a class="btn btn-primary" href="#" role="button">View Your Orders &raquo;</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection