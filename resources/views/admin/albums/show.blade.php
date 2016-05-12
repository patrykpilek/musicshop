@extends('admin.layouts.default')

@section('content')
    <h1 class="page-header">All Albums</h1>
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3><a href="/admin/albums">Album</a><small> &raquo; {{ $album->album_name }} ( {{ $artist->artist_name }} )</small></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p class="text-center">
                            @if(Storage::disk('album')->has($album->id .'-album-image.jpg'))
                                <img class="img-thumbnail" src="{{ url('/admin/albums/image/'. $album->id .'-album-image.jpg') }}" >
                            @else
                                <img class="img-thumbnail" src="{{ Auth::user()->getAvatar() }}" >
                            @endif

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Album:</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{ $album->album_name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Artist:</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{ $artist->artist_name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Price:</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">£{{ $album->price }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Format:</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{ $album->format }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category:</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{ $album->category }}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                            <li role="presentation"><a href="#track_listing" aria-controls="track_listing" role="tab" data-toggle="tab">Track Listing</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <br>
                                <div class="well well-lg">{{ $album->description }}</div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="track_listing">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Track</th>
                                                <th>Track Name</th>
                                                <th>Artist</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tracks as $index => $track)
                                                <tr>
                                                    <td>Tack: {{ $index+1 }}</td>
                                                    <td>{{ $track->track_name }}</td>
                                                    <td>{{ $artist->artist_name  }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <a class="btn btn-primary btn-lg btn-block" href="{{ URL::previous() }}" role="button">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Previous Page
                </a>
            </div>
        </div>

    </div>
@endsection