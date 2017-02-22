@extends('layouts.gentella')
@section('title')
    Rate Management
@endsection
@section('content')
    <button onclick="return newRate();" class="btn btn-info" style="float:right"><i class="fa fa-plus"></i> Add New Rate</button>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <td>ID</td>
            <td>Amount</td>
            <th>Seat</th>
            <th>Created</th>
            <th>User</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($rates as $rate)
            <tr>
                <td>{{ $rate->id }}</td>
                <td>{{ $rate->amount }}</td>
                <td>{{ $rate->seat->name }}</td>
                <td>{{ $rate->created_at }}</td>
                <td>{{ $rate->user->name }}</td>
                <td>
                    <a class="btn btn-info btn-xs" onclick="return editRate({{ $rate->id }},{{ $rate->seat->id }},'{{ str_replace("'"," ",$rate->amount) }}');"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ URL::to("rates/delete/$rate->id") }}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $rates->links() }}

    <div class="modal fade" id="rate_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Rate Form</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label class="control-label col-md-3">Amount</label>
                            <div class="col-md-6">
                                <input required type="text" name="amount" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Level</label>
                            <div class="col-md-6">
                                <select required name="seat_id" class="form-control">
                                    @foreach($seats as $seat)
                                        <option value="{{ $seat->id }}">{{ $seat->name }}</option>
                                    @endforeach
                                </select>
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
        function newRate(){
            $("input[name='id']").val('');
            $("input[name='amount']").val('');
            $("select[name='seat_id']").val('');
            $("#rate_form_modal").modal('show');
        }
        function editRate(id,seat_id,amount){
            $("input[name='id']").val(id);
            $("input[name='amount']").val(amount);
            $("select[name='seat_id']").val(seat_id);
            $("#rate_form_modal").modal('show');
        }
    </script>
@endsection