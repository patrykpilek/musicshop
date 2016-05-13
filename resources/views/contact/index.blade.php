@extends('layouts.default')

@section('content')
    <div class="container marketing">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Contact us</h3>
                    </div>
                    <div class="panel-body">

                        @include('layouts.partials.errors')
                        @include('layouts.partials.success')

                        <form action="/contact" method="post">

                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                            <div class="row control-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row control-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="form-group col-md-12">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row control-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <div class="form-group col-md-12 controls">
                                    <label for="message">Message</label>
                                    <textarea rows="5" class="form-control" id="message" name="message">{{ old('message') }}</textarea>
                                    @if ($errors->has('message'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-envelope"></i> Send
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Our Office</h3>
                    </div>
                    <div class="panel-body">
                        <address>
                            <strong>University of Huddersfield</strong><br>
                            Queensgate, Huddersfield<br />
                            West Yorkshire, HD1 3DH<br />
                            01484 422288<br />
                            hud.ac.uk<br />
                            <abbr title="Phone">P:</abbr> 01484 422288
                        </address>

                        <address>
                            <a href="https://www.hud.ac.uk/">Web page</a>
                        </address>
                        <hr />
                        <div id="googleMap" style="min-width: 300px; min-height: 300px; width: 100%; height: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <script type="text/javascript">
        function initialize() {
            var mapProp = {
                center:new google.maps.LatLng(53.643129, -1.777156),
                zoom:14,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

@endsection