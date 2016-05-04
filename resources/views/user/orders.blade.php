@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Your Orders</h1>
        </div>
        <small>
            <ins><a href="{{ url('/home') }}">Home</a></ins>&nbsp;
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>&nbsp;
            <ins><a href="{{ url('/user') }}">Your Account</a></ins>&nbsp;
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <strong>Your Orders</strong>
        </small>
        <hr>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Your Orders</h3>
                    </div>
                    <div class="panel-body">
                        To Do
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection