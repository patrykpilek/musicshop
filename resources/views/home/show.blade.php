@extends('layouts.default')

@section('content')
    <div class="container marketing">
        <div class="row">
            <hr style="height: 1px; background-color: black;" class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">{{ $album->album_name }}
                        <p><small>{{ $artist->artist_name }}</small></p>
                    </h2>
                    <h4>£{{ $album->price }}</h4>
                    <hr style="height: 1px; background-color: black;">
                    <h4><small>Format: </small>{{ $album->format }}</h4>
                    <h4><small>Category: </small>{{ $album->category }}</h4>
                    <hr style="height: 1px; background-color: black;">
                    <p class="lead">{{ $album->description }}</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive center-block" src="{{ url('/home/albumImage/'. $album->id .'-album-image.jpg') }}" alt="{{ $album->album_name }}" width="500" height="500">
                </div>
            </div>

            <hr style="height: 1px; background-color: black;" class="featurette-divider">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Track</th>
                        <th class="text-center">Track Name</th>
                        <th class="text-center">Artist</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tracks as $index => $track)
                        <tr>
                            <td class="text-center">Tack: {{ $index+1 }}</td>
                            <td class="text-center">{{ $track->track_name }}</td>
                            <td class="text-center">{{ $artist->artist_name  }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <a class="btn btn-primary btn-lg btn-block" href="{{ URL::previous() }}" role="button">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Previous Page
                </a>
            </div>
            <hr style="height: 1px; background-color: black;" class="featurette-divider">
        </div>
    </div>
@endsection