@extends('admin.layouts.default')

@section('content')
    <h1 class="page-header">All Albums</h1>
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3><a href="/admin/albums">Album</a><small> &raquo; {{ $album->album_name }} ( {{ $artist->artist_name }} )</small></h3>
            </div>
        </div>

        @include('layouts.partials.errors')
        @include('layouts.partials.success')

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
                        <p class="text-center">
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-file-upload">
                                <i class="fa fa-upload"></i> Select new photo
                            </button>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="/admin/albums/{{ $album->id }}">

                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group{{ $errors->has('album') ? ' has-error' : '' }}">
                                <label for="album" class="col-md-3 control-label">Album:</label>
                                <div class="col-md-6">
                                    <input type="text" id="album" class="form-control" name="album" value="{{ Request::old('album') ?: $album->album_name }}">

                                    @if ($errors->has('album'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('album') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('artist') ? ' has-error' : '' }}">
                                <label for="artist" class="col-md-3 control-label">Artist:</label>
                                <div class="col-md-6">
                                    <input type="text" id="artist" class="form-control" name="artist" value="{{ Request::old('artist') ?: $artist->artist_name }}">

                                    @if ($errors->has('artist'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('artist') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-3 control-label">Price:</label>
                                <div class="col-md-6">
                                    <input type="text" id="price" class="form-control" name="price" value="{{ Request::old('price') ?: $album->price }}">

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('format') ? ' has-error' : '' }}">
                                <label for="format" class="col-md-3 control-label">Format:</label>
                                <div class="col-md-6">
                                    <input type="text" id="format" class="form-control" name="format" value="{{ Request::old('format') ?: $album->format }}">

                                    @if ($errors->has('format'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('format') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-3 control-label">Category:</label>
                                <div class="col-md-6">
                                    <input type="text" id="category" class="form-control" name="category" value="{{ Request::old('format') ?: $album->category }}">

                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-save"></i>
                                        &nbsp; Save Changes
                                    </button>
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
                                <form class="form-horizontal" role="form" method="post" action="/admin/albums/description/{{ $album->id }}">

                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <textarea id="description" class = "form-control" rows = "4" name="description">{{ Request::old('description') ?: $album->description }}</textarea>

                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-5">
                                            <button type="submit" class="btn btn-primary btn-md">
                                                <i class="fa fa-save"></i>
                                                &nbsp; Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="track_listing">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2">Track</th>
                                                    <th class="col-md-8">Track Name</th>
                                                    <th class="col-md-2">Artist</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($tracks as $index => $track)
                                                <tr>
                                                    <td>Tack: {{ $index+1 }}</td>
                                                    <td>
                                                        <form class="form-inline" role="form" method="post" action="#">

                                                            <input type="hidden" name="_method" value="PUT">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                            <div class="col-md-6">
                                                                <div class="form-group{{ $errors->has('album') ? ' has-error' : '' }}">

                                                                    <input type="text" id="album" class="form-control" name="album" value="{{ Request::old('album') ?: $track->track_name }}">

                                                                    @if ($errors->has('album'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('album') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">

                                                                    <button type="submit" class="btn btn-primary btn-md">
                                                                        <i class="fa fa-save"></i>&nbsp; Save Changes
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
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
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <a class="btn btn-primary btn-lg btn-block" href="{{ url('/admin/albums') }}" role="button">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Previous Page
                </a>
            </div>
        </div>

    </div>

    {{-- Upload File Modal --}}
    <div class="modal fade" id="modal-file-upload">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="/admin/albums/uploadImage/{{ $album->id }}" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">Upload New File</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">
                                File
                            </label>
                            <div class="col-sm-8">
                                <input type="file" id="album_image_name" name="album_image_name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Upload File
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection