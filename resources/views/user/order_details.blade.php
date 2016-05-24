@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Order History</h1>
        </div>
        <small>
            <ins><a href="{{ url('/home') }}">Home</a></ins>&nbsp;
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>&nbsp;
            <ins><a href="{{ url('/user') }}">Your Account</a></ins>&nbsp;
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>&nbsp;
            <ins><a href="{{ url('/user/orders/'. Auth::user()->id) }}">Your Orders</a></ins>&nbsp;
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <strong>Order Details</strong>
        </small>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="page-header">
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Billing address</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="page-header">
                                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                                        <p>{{ $user->address }}</p>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Payment</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="page-header">
                                        <p>Cash on delivery</p>
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">ORDER DETAILS</h3>
                            </div>
                            <div class="panel-body">
                                <div class="page-header">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Album</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Sum</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($orderDetails as $item)
                                            <tr>
                                                <td>
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <img class="img-thumbnail" src="{{ url('/home/albumImage/'. $item->album_id .'-album-image.jpg') }}" alt="{{ $item->album_id }}" width="75" height="75">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">{{ $item->album_name }}</label>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>£{{ $item->price }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>£{{ $item->total_price }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><strong>Total:</strong></td>
                                            <td><strong>&pound;{{ $item->order_total_price }}</strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 col-md-offset-3">
                                    <a class="btn btn-success btn-lg btn-block pull-right" type="button" href="{{ URL::previous() }}">
                                        <i class="fa fa-cc-visa" aria-hidden="true"></i>&nbsp;Previous Page
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection