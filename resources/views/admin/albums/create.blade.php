@extends('admin.layouts.default')

@section('content')

    <h1 class="page-header">New Album</h1>

    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3><a href="/admin/albums">Albums</a><small> &raquo; New Album</small></h3>
            </div>
        </div>

        @include('layouts.partials.success')

        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">New Album</h3>
                </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="{{ url('admin/albums') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('album') ? ' has-error' : '' }}">
                                        <label for="album" class="col-md-3 control-label">Album:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="album" class="form-control" name="album" value="{{ Request::old('album') }}">

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
                                            <input type="text" id="artist" class="form-control" name="artist" value="{{ Request::old('artist') }}">

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
                                            <input type="text" id="price" class="form-control" name="price" value="{{ Request::old('price') }}">

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
                                            <input type="text" id="format" class="form-control" name="format" value="{{ Request::old('format') }}">

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
                                            <input type="text" id="category" class="form-control" name="category" value="{{ Request::old('format') }}">

                                            @if ($errors->has('category'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="category" class="col-md-3 control-label">Description:</label>
                                        <div class="col-md-6">
                                    <textarea rows="3" type="text" id="description" class="form-control" name="description">
                                        {{ Request::old('description') }}
                                    </textarea>

                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                        <label for="category" class="col-md-3 control-label">Album Photo:</label>
                                        <div class="col-md-6">
                                            <input type="file" name="photo" id="photo">

                                            @if ($errors->has('photo'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('photo') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th><label>Track Name</label></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another track name. :)</small></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" id="track_listing" name="track_listing[]" placeholder="Track Name" />
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-add" type="button">
                                                        <i class="glyphicon glyphicon-plus gs"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-5">
                                        <button type="submit" class="btn btn-primary btn-md">
                                            <i class="fa fa-save"></i>
                                            &nbsp; Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function()
        {
            $(document).on('click', '.btn-add', function(e)
            {
                e.preventDefault();

                var controlForm = $(this).closest('table'),
                        currentEntry = $(this).parents('tr:first'),
                        newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('tr:not(:last) .btn-add')
                        .removeClass('btn-add').addClass('btn-remove')
                        .removeClass('btn-success').addClass('btn-danger')
                        .html('<span class="glyphicon glyphicon-minus gs"></span>');
            }).on('click', '.btn-remove', function(e)
            {
                $(this).parents('tr:first').remove();

                e.preventDefault();
                return false;
            });
        });
    </script>
@stop