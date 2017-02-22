
@extends('layouts.gentella')
@section('title')
    Event Management
@endsection
@section('content')
    <button onclick="return newEvent();" class="btn btn-success" style="float:right"><i class="fa fa-plus"></i> Add New Event</button>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Where</th>
            <th>When</th>
            <th>About</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        @foreach($events as $event)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->place }}</td>
                <td>{{ date('d-M-Y h:i a',strtotime($event->event_time)) }}</td>
                <td>{{ $event->about }}</td>
                <td>
                    <a class="btn btn-info btn-xs" onclick="return editEvent({{ $event->id }},'<?php echo  str_replace("'"," ",$event->title) ?>','<?php echo  str_replace("'"," ",$event->place) ?>','<?php echo  str_replace("'"," ",$event->event_time) ?>','<?php echo  str_replace("'"," ",$event->about) ?>');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("events/delete/$event->id") }}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $events->links() }}
    <div class="modal fade" id="event_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Event Form</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label class="control-label col-md-3">Title</label>
                            <div class="col-md-6">
                                <input required type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Where</label>
                            <div class="col-md-6">
                                <input required type="text" name="where" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">When</label>
                            <div class="col-md-6">
                                <input required type="text" name="when" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Event About?</label>
                            <div class="col-md-6">
                                <textarea name="about" class="form-control" placeholder="More details about the event"></textarea>
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
        $(document).ready(function(){
            $("input[name='when']").datetimepicker({
                minDate:'0'//yesterday is minimum date(for today use 0 or -1970/01/01)
            });
        });
        function newEvent(){
            $("input[name='id']").val('');
            $("input[name='title']").val('');
            $("input[name='when']").val('');
            $("input[name='where']").val('');
            $("textarea[name='about']").val('');
            $("#event_form_modal").modal('show');
        }
        function editEvent(id,title,when,where,about){
            $("input[name='id']").val(id);
            $("input[name='title']").val(title);
            $("input[name='when']").val(when);
            $("input[name='where']").val(where);
            $("textarea[name='about']").val(about);
            $("#event_form_modal").modal('show');
        }
    </script>
@endsection