<!-- resources/views/experience/index.blade.php -->

@extends('layouts.gentella')

@section('title')
   Work Experience
@endsection

@section('content')

    <a data-toggle="modal" href="#experience_form_modal" onclick="newExperience();" class="btn btn-info" style="float:right"><i class="fa fa-plus"></i>Add Experience</a>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Place</th>
            <th>Position</th>
            <th>Job Description</th>
            <th>From</th>
            <th>To</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @foreach($experiences as $experience)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $experience->place }}</td>
                <td>{{ $experience->name }}</td>
                <td>{{ $experience->description }}</td>
                <td>{{ $experience->datefrom }}</td>
                <td>{{ $experience->dateto }}</td>
                <td>
                    <a class="btn btn-info btn-xs" onclick="return editExperience({{ $experience->id }},'{{ str_replace("'"," " ,$experience->name) }}','{{ str_replace("'"," " ,$experience->datefrom) }}','{{ str_replace("'"," " ,$experience->dateto) }}','{{ str_replace("'"," " ,$experience->place) }}','{{ str_replace("'"," " ,$experience->description) }}');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("experiences/delete/$experience->id")}}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $experiences->links() }}
    <div class="modal fade" id="experience_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Work Experience Form</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">


                        <div class="form-group">
                            <label class="control-label col-md-3">Place</label>
                            <div class="col-md-6">
                                <input required type="text" placeholder="Company or Organization" name="place" class="form-control">
                            </div>
                        </div>
                               
                                <div class="form-group">
                            <label class="control-label col-md-3">Position</label>
                            <div class="col-md-6">
                                <input placeholder="Job Position" required type="text" name="name" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Job Description</label>
                            <div class="col-md-6">
                                <textarea placeholder="Job Description" name="description" class="form-control" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">From (Date)</label>
                            <div class="col-md-6">
                                <input required type="text" name="datefrom" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">To (Date)</label>
                            <div class="col-md-6">
                                <input required type="text" name="dateto" class="form-control">
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
            $("input[name='datefrom']").datetimepicker({
                timepicker:false,
                maxDate:'0'//yesterday is minimum date(for today use 0 or -1970/01/01)
            });
            $("input[name='dateto']").datetimepicker({
                timepicker:false,
                maxDate:'0'//yesterday is minimum date(for today use 0 or -1970/01/01)
            });
            $("input[name='datefrom']").change(function(){
                var min = $("input[name='datefrom']").val();
                var min = min.split(' ')[0];
                console.log(min);
                $("input[name='dateto']").datetimepicker({
                    minDate:min,
                    maxDate:'0'//yesterday is minimum date(for today use 0 or -1970/01/01)
                });
            });

        });
        function newExperience(){
            $("input[name='id']").val('');
            $("input[name='place']").val('');
            $("input[name='name']").val('');
            $("textarea[name='description']").val('');
            $("input[name='datefrom']").val('');
            $("input[name='dateto']").val('');
//            $("#experience_form_modal").modal('show');
                }
        function editExperience(id,description,datefrom,dateto,place,name){
            $("input[name='id']").val(id);
            $("input[name='name']").val(name);
            $("input[name='place']").val(place);
            $("textarea[name='description']").val(description);
            $("input[name='datefrom']").val(datefrom);
            $("input[name='dateto']").val(dateto);
            $("#experience_form_modal").modal('show');
        }
    </script>
@endsection
