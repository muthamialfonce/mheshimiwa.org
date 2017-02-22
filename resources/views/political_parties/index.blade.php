@extends('layouts.gentella')
@section('title')
    Party Management
@endsection
@section('content')
@include('etc.search',['url'=>Request::url()])

<style>
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #EEEEE0;
 }
</style>
    <a style="float:right" class="btn btn-info" href="{{ URL::to("parties/edit_add") }}"><i class="fa fa-plus"></i> Add New Party</a>
    <a style="float:right" class="btn btn-default" data-toggle="modal" href="#upload_modal"><i class="fa fa-upload"></i> Import</a>
    <table class="table table-bordered table-condensed table-striped table-hover" id="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Abbreviation</th>
            <th>Slogan</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        
        <?php $id=1; ?>

        @foreach($parties as $party)
       
            <tr>
                <td>{{ $id }}</td>
                <td>{{ $party->name }}</td>
                <td>{{ $party->abbreviation }}</td>
                <td>{{ $party->slogan }}</td>
                <td>
                    <a href="{{ URL::to("parties/view/$party->id") }}" class="btn btn-info btn-xs"><i class="fa fa-info"></i> View</a>
                    <a href="{{ URL::to("parties/edit_add/$party->id") }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                    <a onclick="return confirm('Are you sure?');" href="{{ URL::to("parties/delete/$party->id") }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        <?php $id++?>
        @endforeach

        </tbody>
    </table>

    {{ $parties->links() }}

    <div class="modal modal-fade" role="dialog" id="upload_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="btn btn-danger pull-right" data-dismiss="modal">&times;</button>
                    Import Parties from CSV File
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="parties/import" enctype="multipart/form-data">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <label class="col-md-2 control-label">Csv File</label>
                            <div class="col-md-6">
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">&nbsp;</label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
