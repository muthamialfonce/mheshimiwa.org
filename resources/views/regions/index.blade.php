
@extends('layouts.gentella')
@section('title')
    Region Management
    @endsection
@section('content')
    <style>
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #EEEEE0;
 }
</style>
    <button onclick="return newRegion();" style="float:right" class="btn btn-success"><i class="fa fa-plus"></i> Add New Region</button>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>User</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($regions as $region)
            <tr>
                <td>{{ $region->id }}</td>
                <td>{{ $region->name }}</td>
                <td>{{ $region->created_at }}</td>
                <td>{{ $region->user->name }}</td>
                <td>
                    <a class="btn btn-info btn-xs" onclick="return editRegion({{ $region->id }},'<?php echo  str_replace("'"," ",$region->name) ?>');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("regions/delete/$region->id") }}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $regions->links() }}
    <div class="modal fade" id="region_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Region Form</div>
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
    <script type="text/javascript">
        function newRegion(){
            $("input[name='id']").val('');
            $("input[name='name']").val('');
            $("#region_form_modal").modal('show');
        }
        function editRegion(id,name){
            $("input[name='id']").val(id);
            $("input[name='name']").val(name);
            $("#region_form_modal").modal('show');
        }
    </script>
@endsection