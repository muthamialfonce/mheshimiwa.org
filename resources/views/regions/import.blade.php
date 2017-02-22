
@extends('layouts.gentella')
@section('title')
    Upload Csv with Region Data
@endsection
@section('content')
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-md-3">
                <input type="file" name="csv" class="form-control">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
            </div>
        </div>
    </form>
@endsection