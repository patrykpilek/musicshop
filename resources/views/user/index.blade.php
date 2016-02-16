@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2><strong>Your Account</strong></h2></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <h3>Your Details</h3>
                                <dl class="dl-horizontal">
                                    <dt>User Name</dt>
                                    <dd>{{ Auth::user()->username }}</dd>
                                    <dt>User Email</dt>
                                    <dd>{{ Auth::user()->email}}</dd>
                                    <dt>First Name</dt>
                                    <dd>{{ Auth::user()->first_name }}</dd>
                                    <dt>Last Name</dt>
                                    <dd>{{ Auth::user()->last_name }}</dd>
                                </dl>
                                <p><a class="btn btn-default" href="/user/{{ Auth::user()->id }}/edit" role="button">Edit Your Details &raquo;</a></p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Your Address</h3>
                                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                                <p><a class="btn btn-default" href="#" role="button">Edit Your Addresses &raquo;</a></p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Your Orders</h3>
                                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                                <p><a class="btn btn-default" href="#" role="button">View Your Orders &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection