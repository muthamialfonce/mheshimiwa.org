<!-- resources/views/users/edituser.blade.php -->

@extends('layouts.gentella')
@section('title')
    {{ $user->name.' Profile' }}
@endsection
@section('content')
    <style>
        .data{
            border-color: gray;
            background-position: center;
        }
    </style>

    <div class="col-md-5">

        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panel-title">Personal Details</div>
            </div>

            <div class="panel-body col-md-6">

                <table class="table table-condensed table-bordered ">

                    <tr class="profile-data text-center">
                        <td colspan="2"  class="col-md-3">
                            @if(Auth::user()->image)
                                <img height="200px;" class="profile_image" src="{{ URL::to(Auth::user()->image) }}">
                                <a href="#photo_modal" class="btn btn-info" data-toggle="modal">Change Photo</a>
                            @else
                                <a href="#photo_modal" class="btn btn-info" data-toggle="modal">Add Photo</a>
                            @endif
                        </td>
                    </tr>

                    <tr class="profile-data">
                        <td class="col-md-3">Name</td>
                        <td class="col-md-3">{{ $user->name }}</td>

                        <td class="col-md-3">
                            <a class="btn btn-info btn-xs" onclick="return editName({{$user->id }},'{{ str_replace(""," " ,$user->name) }}');"><i class="fa fa-edit"></i> Edit</a>

                        </td>

                    </tr>

                    <tr class="profile-data" >
                        <td class="col-md-3">Email</td>
                        <td class="col-md-3">{{ $user->email }}</td>

                        <td class="col-md-3">
                            {{--<a class="btn btn-info btn-xs" onclick="return editEmail({{$user->id }},'{{ str_replace(""," " ,$user->email) }}');"><i class="fa fa-edit"></i> Edit</a>--}}
&nbsp;
                        </td>

                    </tr>


                    <tr class="profile-data">
                        <td class="col-md-1">Gender</td>
                        <td class="col-md-1">{{ $user->gender }}</td>

                        <td class="col-md-1">
                            <a class="btn btn-info btn-xs" onclick="return editGender({{$user->id }},'{{ str_replace(""," " ,$user->gender) }}');"><i class="fa fa-edit"></i> Edit</a>
                        </td>
                    </tr>


                    <tr class="profile-data">
                        <td class="col-md-3">Change my password</td>
                        <td></td>

                        <td class="col-md-3">
                            <a class="btn btn-info btn-xs" onclick="return editPassword({{$user->id}});"><i class="fa fa-edit"></i> Edit</a>

                        </td>

                    </tr>
                </table>
            </div>

        </div>

    </div>

    <!-- photo edit modal-->
    <div class="modal fade" id="photo_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Change Profile Picture
                    <a data-dismiss="modal" class="btn btn-danger pull-right">&times;</a>
                </div>
                <div class="modal-body">
                    <form action="{{ URL::to("account/profile_image") }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-8">
                                <input type="file" name="image" required class="form-control">
                                <br/>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal name edit -->
    <div class="modal fade" id="user_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                </div>
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

    <!-- modal email edit -->
    <div class="modal fade" id="email_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-6">
                                <input required type="text" name="email" class="form-control">
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


    <div class="modal fade" id="gender_form_modal" role="dialog">
        <div class="modal-dialog modal-md-4">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    User Form</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">

                        <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-6">
                                <input required type="radio" name="gender" class="form-control-sm" value="{{'male'}}">Male &nbsp; &nbsp;
                                <input required type="radio" name="gender" class="form-control-sm" value="{{'female'}}">Female
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



    <!-- modal password edit -->
    <div class="modal fade" id="password_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">

                        <div class="form-group">
                            <label class="control-label col-md-3">New Password</label>
                            <div class="col-md-6">
                                <input required type="password" id="password" name="password" class="form-control" onkeyup="checkPass()">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Confirm Password</label>
                            <div class="col-md-6">
                                <input required type="password" name="cpassword" class="form-control" id="confirm_password" onkeyup="checkPass()">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">&nbsp;</label>
                            <div class="col-md-6">
                                <button id="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        function editName(id,name)
        {
            $("input[name='id']").val(id);
            $("input[name='name']").val(name);
            $("#user_form_modal").modal('show');
        }

        function editEmail(id,email)
        {
            $("input[name='id']").val(id);
            $("input[name='email']").val(email);
            $("#email_form_modal").modal('show');
        }

        function editGender(id,gender)
        {
            $("input[name='id']").val(id);
            $("input[name='gender']").val();
            $("#gender_form_modal").modal('show');
        }

        function editPassword(id)
        {
            $("input[name='id']").val(id);
            $("#password_form_modal").modal('show');
        }

        function checkPass()
        {
            var pass1=document.getElementById('password').value;
            var pass2=document.getElementById('confirm_password').value;

            if (pass1==pass2)
            {
                document.getElementById('submit').disabled=false;
            }
            else{
                document.getElementById('submit').disabled=true;
            }
        }

    </script>
@endsection