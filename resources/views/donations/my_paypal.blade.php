<table class="table table-striped table-condensed table-bordered">
    <tr>
        <th>#</th>
        <th>Reference</th>
        <th>Amount</th>
        <th>Donor</th>
        <th>Phone</th>
        <th>Date</th>
    </tr>
    <?php $no = 1;  ?>
    @foreach($paypal_donations as $donation)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $donation->txn_id }}</td>
            <td>{{ number_format(round($donation->amount*$donation->rate,0),2) }}</td>
            <td>{{ $donation->donor->name }}</td>
            <td>{{ $donation->donor->phone }}</td>
            <td>{{ $donation->created_at }}</td>
        </tr>
    @endforeach
</table>