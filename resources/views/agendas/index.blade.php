@extends('layouts.gentella')
@section('title')
    Agenda Management
@endsection
@section('content')
    <a href="#agenda_form_modal" data-toggle="modal" onclick="newAgenda();" class="btn btn-success" style="float:right"><i class="fa fa-plus"></i> Add New Agenda</a>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <td>#</td>
            <td>Agenda</td>
            <th>Description</th>
            <th>Created</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        @foreach($agendas as $agenda)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $agenda->title }}</td>
                <td>{{ $agenda->description }}</td>
                <td>{{ $agenda->created_at }}</td>
                <td>
                    <a class="btn btn-info btn-xs" onclick="return editAgenda({{ $agenda->id }},'{{ str_replace("'"," ",$agenda->title) }}','{{ str_replace("'"," ",$agenda->description) }}');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("agendas/delete/$agenda->id") }}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $agendas->links() }}

    <div class="modal fade" id="agenda_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Agenda Form</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label class="control-label col-md-3">Agenda</label>
                            <div class="col-md-6">
                                <input required type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-6">
                                <textarea required name="description" class="form-control"></textarea>
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
        function newAgenda(){
            $("input[name='id']").val('');
            $("input[name='title']").val('');
            $("textarea[name='description']").val('');
//            $("#agenda_form_modal").modal('show');
        }
        function editAgenda(id,title,description){
            $("input[name='id']").val(id);
            $("input[name='title']").val(title);
            $("textarea[name='description']").val(description);
            $("#agenda_form_modal").modal('show');
        }
    </script>
@endsection
