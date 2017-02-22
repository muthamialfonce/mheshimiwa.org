<!-- resources/views/users/index.blade.php -->

@extends('layouts.gentella')

@section('title')
Users Management
@endsection

@section('content')

    <button onclick="return newUser();" class="btn btn-info"><i class="fa fa-plus"></i> Add</button>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{$user->phone}}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->user_role }}</td>
                <td>{{ $user->created_at }}</td>

                <td>
                    <a class="btn btn-info btn-xs" onclick="return editUser({{$user->id }},'{{ str_replace(""," " ,$user->name) }}');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("users/delete/$user->id")}}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
    <div class="modal fade" id="user_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    User Form</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-6">
                                <input required type="text" name="name" class="form-control">
                            </div>
                        </div>

                          <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-6">
                                <input required type="radio" name="gender" class="form-control-sm" value="{{'male'}}">Male &nbsp; &nbsp;
                                 <input required type="radio" name="gender" class="form-control-sm" value="{{'female'}}">Female
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Phone Number</label>
                            <div class="col-md-6">
                                <input required type="number" name="phone" class="form-control">
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-6">
                                <input required type="email" name="email" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">&nbsp;</label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function newUser(){
            $("input[name='id']").val('');
            $("input[name='name']").val('');
            $("input[name='gender']").val('');
            $("input[name='phone']").val('');
            $("input[name='email']").val('');
            $("#user_form_modal").modal('show');
        }
        function editUser(id,name,gender,email,phone){
            $("input[name='id']").val(id);
            $("input[name='name']").val(name);
            $("input[name='phone']").val(phone);
            $("input[name='gender']").val(gender);
            $("input[name='email']").val(email);
            $("#user_form_modal").modal('show');
        }
    </script>
@endsection
