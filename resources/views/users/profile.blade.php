@extends('layouts.gentella')
@section('title')
    {{ $user->name.' Profile' }}
@endsection
@section('content')
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Personal Details</div>
            </div>
            <div class="panel-body">
                <table class="table table-condensed table-bordered">
                    <tr class="clients-comments text-center">
                        <td colspan="2">
                            @if(Auth::user()->image)
                                <img height="200px;" class="profile_image" src="{{ URL::to(Auth::user()->image) }}">
                                <a href="#photo_modal" class="btn btn-info" data-toggle="modal">Change Photo</a>
                            @else
                                <a href="#photo_modal" class="btn btn-info" data-toggle="modal">Add Photo</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $user->phone or 'n/a' }}</td>
                    </tr>                               
                </table>
            </div>
        </div>
    </div>

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
@endsection