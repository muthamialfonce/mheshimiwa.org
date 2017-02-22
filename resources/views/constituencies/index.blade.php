@extends('layouts.gentella')
@section('title')
    Constituency Management
@endsection
@section('content')
   @include('etc.search',['url'=>Request::url()])
    <style>
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #EEEEE0;
 }
 </style>
    <button style="float:right" onclick="return newConstituency();" class="btn btn-success"><i class="fa fa-plus"></i> Add New Constituency</button>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>County</th>
            <th>Created</th>
            <th>User</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($constituencies as $constituency)
            <tr>
                <td>{{ $constituency->id }}</td>
                <td>{{ $constituency->name }}</td>
                <td>{{ $constituency->county }}</td>
                <td>{{ $constituency->created_at }}</td>
                <td>{{ $constituency->username }}</td>
                <td>
                    <a class="btn btn-info btn-xs" onclick="return editConstituency({{ $constituency->id }},{{ $constituency->countyId }},'{{ str_replace("'"," ",$constituency->name) }}');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("countys/delete/$constituency->id") }}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $constituencies->links() }}

    <div class="modal fade" id="constituency_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Constituency Form</div>
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
                            <label class="control-label col-md-3">County</label>
                            <div class="col-md-6">
                                <select required name="county_id" class="form-control">
                                    @foreach($counties as $county)
                                        <option value="{{ $county->id }}">{{ $county->name }}</option>
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
        function newConstituency(){
            $("input[name='id']").val('');
            $("input[name='name']").val('');
            $("select[name='county_id']").val('');
            $("#constituency_form_modal").modal('show');
        }
        function editConstituency(id,county_id,name){
            $("input[name='id']").val(id);
            $("select[name='county_id']").val(county_id);
            $("input[name='name']").val(name);
            $("#constituency_form_modal").modal('show');
        }
        $("select[name='county_id']").select2();
    </script>
@endsection
