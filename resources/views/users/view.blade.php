@extends('layouts.gentella')
@section('title')
    {{ str_plural($role) }}
@endsection
@section('content')

    @include('etc.search',['url'=>Request::url()])

    <table class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <?php
            ?>

            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>

                <td>
                    <a onclick="setId({{ $user->id }})" href="#change_role_modal" data-toggle="modal" class="btn btn-xs btn-warning">Role</a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
    <div class="modal fade" id="change_role_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a data-dismiss="modal" class="btn btn-danger pull-right">&times;</a>
                    <h3>Change User Role</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{ URL::to('user/change-role') }}">
                        {{ csrf_field() }}
                        <input type="hidden" value="" name="id">
                        <div class="form-group">
                            <label class="control-label col-md-3">Role</label>
                            <div class="col-md-6">
                                <select name="role" class="form-control">
                                    <option value="politician">Politician</option>
                                    <option value="editor">Editor</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">&nbsp;</label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function setId(id){
            $("input[name='id']").val(id);
        }
    </script>
@endsection