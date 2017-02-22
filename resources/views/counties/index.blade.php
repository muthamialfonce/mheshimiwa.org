@extends('layouts.gentella')
@section('title')
    County Management
    @endsection
    @section('content')
    
    @include('etc.search',['url'=>Request::url()])
    <style>
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #EEEEE0;
 }
</style>
        <button style="float:right" onclick="return newCounty();" class="btn btn-success"><i class="fa fa-plus"></i> Add New County</button>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <th>Region</th>
                <th>Created </th>
                <th>User</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($counties as $county)
                <tr>
                    <td>{{ $county->id }}</td>
                    <td>{{ $county->name }}</td>
                    <td>{{ $county->region }}</td>
                    <td>{{ $county->created_at }}</td>
                    <td>{{ $county->username }}</td>
                    <td>
                        <a class="btn btn-info btn-xs" onclick="return editCounty({{ $county->id }},{{ $county->regionId }},'{{ str_replace("'"," ",$county->name) }}');"><i class="fa fa-edit"></i> Edit</a>
                        <a href="{{ URL::to("counties/delete/$county->id") }}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $counties->links() }}

        <div class="modal fade" id="county_form_modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                        County Form</div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label class="control-label col-md-3">Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Region</label>
                                <div class="col-md-6">
                                    <select required name="region_id" class="form-control">
                                        @foreach($regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                            @endforeach
                                    </select>
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
            function newCounty(){
                $("input[name='id']").val('');
                $("input[name='name']").val('');
                $("select[name='region_id']").val('');
                $("#county_form_modal").modal('show');
            }
            function editCounty(id,region_id,name){
                $("input[name='id']").val(id);
                $("select[name='region_id']").val(region_id);
                $("input[name='name']").val(name);
                $("#county_form_modal").modal('show');
            }
        </script>
            @endsection
