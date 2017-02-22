<!-- resources/views/education_levels/academiclevel.blade.php -->

@extends('layouts.gentella')

@section('title')
    Academic Levels
@endsection

@section('content')

    <button onclick="return newAcademicLevel();" class="btn btn-info" style="float:right"><i class="fa fa-plus"></i> Add Academic Level</button>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Created At</th>
            <th>Created By</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($academiclevels as $academiclevel)
            <tr>
                <td>{{ $academiclevel->id }}</td>
                <td>{{ $academiclevel->name }}</td>
                <td>{{ $academiclevel->details }}</td>
                <td>{{ $academiclevel->created_at }}</td>
                <td>{{ $academiclevel->user->name }}</td>

                <td>
                    <a class="btn btn-info btn-xs" onclick="return editAcademicLevel({{$academiclevel->id }},'{{ str_replace("'"," " ,$academiclevel->name) }}','{{ str_replace("'"," " ,$academiclevel->details) }}');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("academic/delete/$academiclevel->id")}}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $academiclevels->links() }}
    <div class="modal fade" id="academiclevel_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Academic Level Form</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">
                        

                        <div class="form-group">
                            <label class="control-label col-md-3">Level Name</label>
                            <div class="col-md-6">
                                <input required type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Level Details</label>
                            <div class="col-md-6">
                                <input required type="text" name="details" class="form-control">
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
        function newAcademicLevel(){
            $("input[name='id']").val('');
            $("input[name='name']").val('');
            $("input[name='details']").val('');
            $("#academiclevel_form_modal").modal('show');
        }
        function editAcademicLevel(id,name,details){
            $("input[name='id']").val(id);
            $("input[name='details']").val(details);
            $("input[name='name']").val(name);
            $("#academiclevel_form_modal").modal('show');
        }
    </script>
@endsection
