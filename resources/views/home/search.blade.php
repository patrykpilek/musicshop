@extends('layouts.default')

@section('content')
    <div class="container marketing">
        <div class="row">
            @if (!$albums)
                <p>No results found, Sorry.</p>
            @else
                @foreach ($albums as $album)
                    <div class="col-lg-4">
                        <img class="img-thumbnail" src="{{ url('/home/albumImage/'. $album->id .'-album-image.jpg') }}" alt="{{ $album->album_name }}" width="250" height="250">
                        <h2>{{ $album->album_name }}<p><small>{{ $album->artist_name }}</small></p></h2>
                        <h5>{{ $album->format }}</h5>
                        <p><a class="btn btn-primary" href="{{ url('/home/show/'. $album->id ) }}" role="button">View details &raquo;</a></p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection