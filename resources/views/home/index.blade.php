@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        @if(Auth::check())
                            Your are logged in!
                            <p>Welcome back, {{ Auth::user()->username }}</p>
                        @else
                            Hello, Stranger!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container marketing">
        <div class="row">
            @foreach ($albums as $album)
                <div class="col-lg-4">
                    <img class="img-thumbnail" src="{{ url('/home/albumImage/'. $album->id .'-album-image.jpg') }}" alt="{{ $album->album_name }}" width="250" height="250">
                    <h2>{{ $album->album_name }}<p><small>{{ $album->artist_name }}</small></p></h2>
                    <h5>{{ $album->format }}</h5>
                    <p><a class="btn btn-primary" href="{{ url('/home/show/'. $album->id ) }}" role="button">View details &raquo;</a></p>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            {!! $albums->links() !!}
        </div>
    </div>
@endsection