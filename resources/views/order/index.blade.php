@extends('layouts.default')

@section('content')

    <div class="container marketing">
        <div class="row">
            <div class="page-header">
                <h1>SUMMARY <small>Please check your order</small></h1>
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
                        <h3 class="panel-title">DETAILS</h3>
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
                                @foreach ($basket as $item)
                                    <tr>
                                        <td>
                                            <form class="form-inline">
                                                <div class="form-group">
                                                    <img class="img-thumbnail" src="{{ url('/home/albumImage/'. $item->id .'-album-image.jpg') }}" alt="{{ $item->id }}" width="75" height="75">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{ $item->name }}</label>
                                                </div>
                                            </form>
                                        </td>
                                        <td>£{{ $item->price }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>£{{ $item->subtotal }}</td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Total:</strong></td>
                                        <td><strong>&pound;{{ Cart::total() }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                            <a class="btn btn-success btn-lg btn-block pull-right" type="button" href="{{ url('/order/save') }}">
                                <i class="fa fa-cc-visa" aria-hidden="true"></i>&nbsp;Buy now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection