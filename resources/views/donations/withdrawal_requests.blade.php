<h2>
    Withdrawal Requests
</h2>

<table class="table table-striped">
    <thead>
    <th>#</th>
    <th>Amount</th>
    <th>Method</th>
    <th>Txn Code</th>
    <th>Date</th>
    <th>Status</th>
    @if(Auth::user()->role=='admin')
        <th>
            Action
        </th>
        @endif
    </thead>
    <tbody>
    <?php $no=1; ?>
    @foreach($withdrawal_requests as $withdrawal_request)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ number_format($withdrawal_request->amount,2) }}</td>
            <td>{{ $withdrawal_request->method.':'.$withdrawal_request->account }}</td>
            <td>{{ $withdrawal_request->transaction_code != "" ? $withdrawal_request->transaction_code:'--' }}</td>
            <td>{{ $withdrawal_request->created_at }}</td>
            <td>
                @if($withdrawal_request->status == 0)
                    <span style="color:red;"><i class="fa fa-times"></i> Pending</span>
                    @else
                <span style="color:green;"><i class="fa fa-check"></i> Processed</span>
                @endif
            </td>
            @if(Auth::user()->role=='admin')
                <td>
                    @if($withdrawal_request->status == 0)
                        <a class="btn btn-primary btn-sm" href="{{ URL::to("user/donations/$user->id/process/$withdrawal_request->id") }}">Process</a>
                    @endif
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>