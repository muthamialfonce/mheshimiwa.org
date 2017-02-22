@extends('layouts.gentella')
@section('title')
    System Configurations
@endsection
@section('content')

    <div class="col-md-6">
        <a class="btn btn-info pull-right" onclick="return addConfig();"><i class="fa fa-plus"></i> Add Config</a>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type</th>
                <th>Amount</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach($configurations as $configuration)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ ucwords(str_replace('_',' ',$configuration->slug)) }}</td>
                    <td>{{ $configuration->inc_type }}</td>
                    <td>
                        @if($configuration->inc_type=='percentage')
                            {{ $configuration->amount.'%' }}
                            @else
                            KES. {{ number_format($configuration->amount,2) }}
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info" onclick="return editConfig({{ $configuration }})">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function addConfig(){
            $("#config_form").find("input[type=text], textarea").val("");
            $("#config_modal").modal('show');
        }
        function editConfig(details){
            autofillForm(details);
            $("#config_modal").modal('show');
        }
    </script>
    <div class="modal fade" id="config_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <a data-dismiss="modal" class="btn btn-danger pull-right">&times;</a>
                        <h4>Config Form</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="config_form" class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-6">
                                <input type="text" required name="slug" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Charge Type</label>
                            <div class="col-md-6">
                                <select name="inc_type" class="form-control">
                                    <option value="amount">Amount</option>
                                    <option value="percentage">Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Amount</label>
                            <div class="col-md-6">
                                <input type="text" required name="amount" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">&nbsp;</label>
                            <div class="col-md-6">
                                <input type="submit" required name="submit" class="btn btn-success" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
