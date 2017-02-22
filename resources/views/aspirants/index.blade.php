@extends('layouts.gentella')
@section('title')
    {{ $seat->name or 'All'.' Aspirants' }}
@endsection
@section('content')

    @include('etc.search',['url'=>Request::url()])

    <table class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Party</th>
            <th>County</th>
            <th>Seat</th>
            <th>Balance</th>
            <th>Approved</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($leaders as $leader)
            <?php
            ?>

            <tr>
                <td>{{ $leader->id }}</td>
                <td>{{ $leader->name }}</td>
                <td>{{ $leader->party.'('.$leader->abbrev.')' }}</td>
                <td>{{ $leader->county_name or 'n/a' }}</td>
                <td>{{ $leader->seat }}</td>
                <td>{{ number_format($leader->balance(),2) }}</td>
                <td>
                    @if($leader->approved == 1)
                        <i class="fa fa-check" style="color:green;"></i>
                    @else
                        <i class="fa fa-remove" style="color:red;"></i>
                    @endif
                </td>
                <td>
                    <a onclick="setId({{ $leader->id }})" href="#change_role_modal" data-toggle="modal" class="btn btn-xs btn-warning">Role</a>
                    <a href="{{ URL::to("profile/view/$leader->id") }}" class="btn btn-info btn-xs"><i class="fa fa-user" ></i> Profile</a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    {{ $leaders->links() }}
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