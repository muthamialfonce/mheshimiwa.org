@extends('layouts.gentella')
@section('title')
    Seat Management
@endsection
@section('content')
    <button onclick="return newSeat();" class="btn btn-info" style="float:right"><i class="fa fa-plus"></i> Add New Seat </button>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Level</th>
            <th>&nbsp</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seats as $seat)
            <tr>
                <td>{{ $seat->id }}</td>
                <td>{{ $seat->name }}</td>
                <td>{{ $seat->politicalLevel->name }}</td>
                <td>
                    <a class="btn btn-info btn-xs" onclick="return editSeat({{ $seat->id }},{{ $seat->rank }},{{ $seat->political_level_id }},'{{ str_replace("'"," ",$seat->name) }}','{{ str_replace("'"," ",$seat->description) }}');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("seats/delete/$seat->id") }}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $seats->links() }}

    <div class="modal fade" id="seat_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Seat Form</div>
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
                            <label class="control-label col-md-3">Level</label>
                            <div class="col-md-6">
                                <select required name="level_id" class="form-control">
                                    @foreach($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
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
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function newSeat(){
            $("input[name='id']").val('');
            $("input[name='rank']").val('');
            $("select[name='level_id']").val('');
            $("textarea[name='description']").val('');
            $("input[name='name']").val('');
            $("#seat_form_modal").modal('show');
        }
        function editSeat(id,rank,level_id,name,description){
            $("select[name='level_id']").val(level_id);
            $("input[name='id']").val(id);
            $("input[name='rank']").val(rank);
            $("textarea[name='description']").val(description);
            $("input[name='name']").val(name);
            $("#seat_form_modal").modal('show');
        }
    </script>
@endsection
