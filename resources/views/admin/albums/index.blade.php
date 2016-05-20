@extends('admin.layouts.default')

@section('content')

    <h1 class="page-header">All Albums</h1>

    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3><a href="/admin/users">Albums</a><small> &raquo; List</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/albums/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> Add New Album
                </a>
            </div>
        </div>

        <div class="row">
            @include('layouts.partials.success')
            <div class="col-sm-12">
                <table id="users-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Album Name</th>
                            <th>Artist Name</th>
                            <th class="hidden-sm col-md-5">Description</th>
                            <th class="hidden-md">Price</th>
                            <th class="hidden-md">Format</th>
                            <th class="hidden-md">Category</th>
                            <th data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($albums as $album)
                        <tr>
                            <td>{{ $album->album_name }}</td>
                            <td>{{ $album->artist_name }}</td>
                            <td class="hidden-sm">{{ $album->description }}</td>
                            <td class="hidden-md">{{ $album->price }}</td>
                            <td class="hidden-md">{{ $album->format }}</td>
                            <td class="hidden-md">{{ $album->category }}</td>
                            <td>
                                <a href="/admin/albums/{{ $album->id }}"
                                   class="btn btn-info btn-xs">
                                    <i class="fa fa-eye"></i> Show
                                </a>
                                <a href="/admin/albums/{{ $album->id }}/edit"
                                   class="btn btn-primary btn-xs">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirmDelete"
                                   data-user_id="{{ $album->id }}"
                                   data-user_first="{{ $album->album_name }}"
                                   data-user_last="{{ $album->artist_name }}">
                                    <i class="fa fa-times-circle"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Confirm Modal Delete --}}
    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Please Confirm</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i> &nbsp;
                        Are you sure you want to delete this user:
                        </br><span id="userNumber"></span> ?
                    </p>
                </div>
                <div class="modal-footer">

                    <form id="delForm" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-btn fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {
            $("#users-table").DataTable();

            $('#confirmDelete').on('show.bs.modal', function (event) {
                var userId = $(event.relatedTarget).data('user_id');
                var userFirst = $(event.relatedTarget).data('user_first');
                var userLast = $(event.relatedTarget).data('user_last');

                $('#userNumber').text('( id ' + userId + ' - ' + userFirst + ' ' + userLast + ' )');
                $('#delForm').attr('action', '/admin/users/' + userId);
            })
        });
    </script>
@stop