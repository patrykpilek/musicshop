@extends('admin.layouts.default')

@section('content')
    <h1 class="page-header">All Users</h1>

    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3><a href="/admin/users">Users</a><small> &raquo; List</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/users/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> Add New User
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table id="users-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th class="hidden-sm">Email</th>
                            <th class="hidden-md">First Name</th>
                            <th class="hidden-md">Last Name</th>
                            <th class="hidden-md">Address</th>
                            <th class="hidden-md">Is Admin</th>
                            <th class="hidden-md">Created At</th>
                            <th class="hidden-md">Updated At</th>
                            <th data-sortable="false">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td class="hidden-sm">{{ $user->email }}</td>
                                <td class="hidden-md">{{ $user->first_name }}</td>
                                <td class="hidden-md">{{ $user->last_name }}</td>
                                <td class="hidden-md">{{ $user->address }}</td>
                                <td class="hidden-md">
                                    @if( $user->is_admin == 1)
                                        true
                                    @else
                                        false
                                    @endif
                                <td class="hidden-md">{{ $user->created_at }}</td>
                                <td class="hidden-md">{{ $user->updated_at }}</td>
                                <td>
                                    <a href="/admin/users/{{ $user->id }}/edit"
                                       class="btn btn-info btn-xs">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $("#users-table").DataTable({
                createdRow: function ( row ) {
                    $('td', row).attr('tabindex', 0);
                }
            });
        });
    </script>
@stop