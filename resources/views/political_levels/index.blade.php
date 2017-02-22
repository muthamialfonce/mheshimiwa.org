@extends('layouts.gentella')
@section('title')
    Level Management
@endsection
@section('content')
    <button onclick="return newLevel();" class="btn btn-info" style="float:right"><i class="fa fa-plus"></i> create new level</button>

    <table class="table table-striped">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <th>Description</th>
            <th>Created</th>
            <th>User</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($levels as $level)
            <tr>
                <td>{{ $level->id }}</td>
                <td>{{ $level->name }}</td>
                <td>{{ $level->description }}</td>
                <td>{{ $level->created_at }}</td>
                <td>{{ $level->user->name }}</td>
                <td>
                    <a class="btn btn-primary btn-xs" onclick="return editLevel({{ $level->id }},{{ $level->rank }},'{{ str_replace("'"," ",$level->name) }}','{{ str_replace("'"," ",$level->description) }}');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("levels/delete/$level->id") }}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $levels->links() }}

    <div class="modal fade" id="level_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Level Form</div>
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
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-6">
                                <textarea required name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Rank</label>
                            <div class="col-md-6">
                                <input required type="number" name="rank" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">&nbsp;</label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success" style="float:right"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function newLevel(){
            $("input[name='id']").val('');
            $("input[name='rank']").val('');
            $("textarea[name='description']").val('');
            $("input[name='name']").val('');
            $("#level_form_modal").modal('show');
        }
        function editLevel(id,rank,name,description){
            $("input[name='id']").val(id);
            $("input[name='rank']").val(rank);
            $("textarea[name='description']").val(description);
            $("input[name='name']").val(name);
            $("#level_form_modal").modal('show');
        }
        $("select[name='constituency_id']").select2();
    </script>
@endsection
