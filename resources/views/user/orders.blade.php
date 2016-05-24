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
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <strong>Your Orders</strong>
        </small>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Your Orders</h3>
                    </div>
                    <div class="panel-body">
                        @foreach ($orders as $order)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order Placed <br> {{ date('d F, Y H:i', strtotime($order->created_at)) }}</th>
                                        <th>Total: <br>&pound;{{ $order->order_total_price }}</th>
                                        <th>Order Number: <br>{{ $order->order_number }}</th>
                                        @if ($order->accepted == 1)
                                            <th class="success">Status: <br>Accepted</th>
                                        @else
                                            <th class="info">Status: <br>Pending</th>
                                        @endif
                                        <th>
                                            <a class="btn btn-primary" type="button" href="{{ url('/order/'.$order->id) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View Order
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection