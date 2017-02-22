{{--<div class="col-md-6">--}}
{{--<div class="panel panel-default">--}}
{{--<div class="panel-heading">Party Manifestos</div>--}}
{{--<div class="panel-body">--}}
{{--<button onclick="return addManifesto();" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add</button>--}}
{{--<table class="table table-condensed table-bordered">--}}
{{--<tr>--}}
{{--<th>ID</th>--}}
{{--<th>Manifesto</th>--}}
{{--<th>Achievement Strategy</th>--}}
{{--<th>Action</th>--}}
{{--</tr>--}}
{{--@foreach($manifestos as $manifesto)--}}
{{--<tr>--}}
{{--<td>{{ $manifesto->id }}</td>--}}
{{--<td>{{ $manifesto->title }}</td>--}}
{{--<td>{{ $manifesto->description }}</td>--}}
{{--<td>--}}
{{--<a onclick="return confirm('Are you sure?');" href="{{ URL::to("parties/view/$party->id/delete_manifesto/$manifesto->id") }}" class="btn btn-danger btn-xs">Delete</a>--}}
{{--<a onclick="return editManifesto({{ $manifesto->id }},'{{ str_replace("'","",$manifesto->title) }}','{{ str_replace("'","",$manifesto->description) }}')" class="btn btn-info btn-xs">Edit</a>--}}
{{--</td>--}}
{{--</tr>--}}
{{--@endforeach--}}
{{--</table>--}}
{{--{{ $manifestos->links() }}--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

<div class="modal fade" role="dialog" id="manifesto_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Manifesto Form
                </div>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label class="control-label col-md-3">Title</label>
                        <div class="col-md-6">
                            <input type="text" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-6">
                            <textarea name="description" class="form-control" placeholder="More details about the manifesto like how it can be achieved etc.. "></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">&nbsp;</label>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function addManifesto(){
        $("input[name='id']").val('');
        $("input[name='title']").val('');
        $("textarea[name='description']").val('');
        $("#manifesto_modal").modal('show');
        return false;
    }
    function editManifesto(id,title,description){
        $("input[name='id']").val(id);
        $("input[name='title']").val(title);
        $("textarea[name='description']").val(description);
        $("#manifesto_modal").modal('show');
        return false;
    }
</script>