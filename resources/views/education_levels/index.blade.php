<!-- resources/views/education_levels/index.blade.php -->

@extends('layouts.gentella')

@section('title')
    Education Levels
@endsection

@section('content')

    <a href="#educationlevel_form_modal" data-toggle="modal" onclick="newEducationLevel();" class="btn btn-default" style="float:right"><i class="fa fa-plus"></i> Add Education Level</a>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Level</th>
            <th>Institution Name</th>
            <th>Period</th>
            <th>Grade/Score</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        @foreach($educationlevels as $educationlevel)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $educationlevel->academic_level->name }}</td>
                <td>{{ $educationlevel->name }}</td>
                <td>{{ $educationlevel->joined.' - '.$educationlevel->completed }}</td>
                <td>{{ $educationlevel->achievement }}</td>
                <td>{{ $educationlevel->created_at }}</td>
                <td>
                    <a class="btn btn-info btn-xs" onclick="return editEducationLevel({{$educationlevel->id }},'{{ str_replace("'"," " ,$educationlevel->name) }}','{{ str_replace("'"," " ,$educationlevel->joined) }}','{{ str_replace("'"," " ,$educationlevel->completed) }}','{{ str_replace(""," " ,$educationlevel->achievement) }}','{{ str_replace("'"," " ,$educationlevel->academic_level_id) }}' );"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("education/delete/$educationlevel->id")}}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $educationlevels->links() }}
    <div class="modal fade" id="educationlevel_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Education Level Form</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">

                           <!-- Select County -->
                         <div class="form-group">

                                    {!! Form::label('academic_level_id', 'Academic Level', ['class' => 'col-md-3 control-label']) !!}
        
                            <div class="col-sm-6">
                     
                                {!! Form::select('academic_level_id', $academiclevels,2,['required', 'class' => 'form-control','placeholder'=>'Select Academic Level']) !!}

                            </div>

                        </div>

        


                        <div class="form-group">
                            <label class="control-label col-md-3">Institution Name</label>
                            <div class="col-md-6">
                                <input required type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Year Joined</label>
                            <div class="col-md-6">
                                <select onchange="setTo();" name="joined" required class="form-control">
                                    <option value="">Select..</option>
                                    @for($i=1940;$i<=date('Y');$i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Year Completed</label>
                            <div class="col-md-6">
                                <select name="completed" required class="form-control">
                                    <option value="">Select..</option>
                                    @for($i=1940;$i<=date('Y');$i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Grade/Score</label>
                            <div class="col-md-6">
                                <input required type="text" name="achievement" class="form-control">
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
        function setTo(){
            var selected = $("select[name='joined']").val();
            var max = "{{ date('Y') }}";
            max = parseInt(max);
            selected = parseInt(selected);
            $("select[name='completed']").html('');
            $("select[name='completed']").append('<option value="">Select</option>');
            for(i=selected;i<=max;i++){
                $("select[name='completed']").append('<option value="'+i+'">'+i+'</option>');
            }
        }
        function newEducationLevel(){
            $("input[name='id']").val('');
            $("select[name='academic_level_id']").val('');
            $("input[name='name']").val('');
            $("select[name='joined']").val('');
            $("select[name='completed']").val('');
            $("input[name='achievement']").val('');
//            $("#educationlevel_form_modal").modal('show');
        }
        function editEducationLevel(id,name,joined,completed,achievement,academic_level_id){
            $("input[name='id']").val(id);
            $("select[name='academic_level_id']").val(academic_level_id);
            $("input[name='name']").val(name);
            $("select[name='joined']").val(joined);
            $("select[name='completed']").val(completed);
            $("input[name='achievement']").val(achievement);
            $("#educationlevel_form_modal").modal('show');
        }
    </script>
@endsection
