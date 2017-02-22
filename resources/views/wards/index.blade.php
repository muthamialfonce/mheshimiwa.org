@extends('layouts.gentella')
@section('title')
    Ward Management
@endsection
@section('content')
    @include('etc.search',['url'=>Request::url()])
    <style>
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #EEEEE0;
 }
 </style>
    <button style="float:right" onclick="return newWard();" class="btn btn-success"><i class="fa fa-plus"></i> Add New Ward</button>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Constituency</th>
            <th>Created</th>
            <th>User</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($wards as $ward)
            <tr>
                <td>{{ $ward->id }}</td>
                <td>{{ $ward->name }}</td>
                <td>{{ $ward->constituency }}</td>
                <td>{{ $ward->created_at }}</td>
                <td>{{ $ward->username }}</td>
                <td>
                    <a class="btn btn-info btn-xs" onclick="return editWard({{ $ward->id }},{{ $ward->constituencyId }},'{{ str_replace("'"," ",$ward->name) }}');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("constituency/delete/$ward->id") }}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $wards->links() }}

    <div class="modal fade" id="ward_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Ward Form</div>
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
                            <label class="control-label col-md-3">constituency</label>
                            <div class="col-md-6">
                                <select required name="constituency_id" class="form-control">
                                    @foreach($constituencies as $constituency)
                                        <option value="{{ $constituency->id }}">{{ $constituency->name }}</option>
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
        function newWard(){
            $("input[name='id']").val('');
            $("input[name='name']").val('');
            $("select[name='constituency_id']").val('');
            $("#ward_form_modal").modal('show');
        }
        function editWard(id,constituency_id,name){
            $("input[name='id']").val(id);
            $("select[name='constituency_id']").val(constituency_id);
            $("input[name='name']").val(name);
            $("#ward_form_modal").modal('show');
        }
        $("select[name='constituency_id']").select2();
    </script>
@endsection
