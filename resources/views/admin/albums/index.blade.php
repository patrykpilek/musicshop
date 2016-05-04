@extends('admin.layouts.default')

@section('content')

    <h1 class="page-header">All Albums</h1>

    <div class="container marketing">
        {{--<div class="row">--}}
            {{--@foreach($albums as $album)--}}
                {{--<div class="col-md-4">--}}
                    {{--<img class="img-thumbnail" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">--}}
                    {{--<h2>{{ $album->artist_name }}</h2>--}}
                    {{--<p>{{ $album->album_name }}</p>--}}
                    {{--<p>{{ $album->description }}</p>--}}
                    {{--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}

        <div class="row">
            @foreach($albums as $album)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="242" height="200">
                    <div class="caption">
                        <h3>{{ $album->artist_name }}</h3>
                        <p>{{ $album->album_name }}</p>
                        <p>{{ $album->description }}</p>
                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection