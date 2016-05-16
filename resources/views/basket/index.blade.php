@extends('layouts.default')

@section('content')

    <div class="container marketing">
        <div class="row">
            <div class="col-md-8">
                @if ($basket->count())

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Album</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
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
                                <td>
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <a class="cart_quantity_up" href="{{ url("/basket?album_id=$item->id&increment=1") }}"> <i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="quantity" class="form-control" id="quantity" value="{{ $item->qty }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <a class="cart_quantity_down" href="{{ url("/basket?album_id=$item->id&decrease=1") }}"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        </div>
                                    </form>
                                </td>

                                <td>£{{ $item->subtotal }}</td>
                                <td>
                                    <a class="btn btn-danger" href="{{ url("/basket?album_id=$item->id&remove=all") }}">
                                        <i class="fa fa-trash-o" title="Delete" aria-hidden="true"></i>
                                        <span class="sr-only">Delete</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>Your Basket is currently empty.</h3>
                @endif
            </div>

            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Basket</h3>
                    </div>
                    <div class="panel-body">
                        <div class="page-header">
                            <h1><small>Total: </small>£
                                @if ($basket->count())
                                    {{Cart::total()}}
                                @else
                                    0
                                @endif

                            </h1>
                        </div>
                        <a class="btn btn-primary btn-lg btn-block" type="button" href="{{ url('/basket/clear') }}">Clear Basket</a>
                        <br>
                        <p class="text-center">or</p>
                        <a class="btn btn-primary btn-lg btn-block" type="button" href="">Pay by cash</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection