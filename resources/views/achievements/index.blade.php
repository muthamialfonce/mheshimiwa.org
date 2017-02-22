<!-- resources/views/achievement/index.blade.php -->

@extends('layouts.gentella')

@section('title')
    Achievements
@endsection

@section('content')

    <a href="#achievement_form_modal" data-toggle="modal" onclick="newAchievement();" class="btn btn-info" style="float:right"><i class="fa fa-plus"></i> Add Achievement</a>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Achievement</th>
            <th>Description</th>
            {{--<th>Date</th>--}}
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        @foreach($achievements as $achievement)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $achievement->achievement }}</td>
                <td>{{ $achievement->description }}</td>
                {{--<td>{{ $achievement->date }}</td>--}}
                <td>
                    <a class="btn btn-info btn-xs" onclick="return editAchievement ( {{ $achievement->id }},'{{ str_replace("'"," " ,$achievement->achievement) }}','{{ str_replace("'"," " ,$achievement->date) }}','{{ str_replace("'"," " ,$achievement->description) }}');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("achievement/delete/$achievement->id")}}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $achievements->links() }}
    <div class="modal fade" id="achievement_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Achievement Form</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label class="control-label col-md-3">Achievement</label>
                            <div class="col-md-6">
                                <input required type="text" name="achievement" class="form-control">
                            </div>
                        </div>

                            <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-6">
                                <textarea required name="description" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<label class="control-label col-md-3">Date</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input required type="text" name="date" class="form-control">--}}
                            {{--</div>--}}
                        {{--</div>--}}


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
        $(document).ready(function(){
            $("input[name='date']").datetimepicker({
                minDate:'0'//yesterday is minimum date(for today use 0 or -1970/01/01)
            });
        });

        function newAchievement(){
            $("input[name='id']").val('');
            $("input[name='achievement']").val('');
            $("textarea[name='description']").val('');
//            $("input[name='date']").val('');
                }
        function editAchievement(id,achievement,date,description){
            $("input[name='id']").val(id);
            $("input[name='achievement']").val(achievement);
             $("textarea[name='description']").val(description);
//            $("input[name='date']").val(date);
            $("#achievement_form_modal").modal('show');
        }
    </script>
@endsection
