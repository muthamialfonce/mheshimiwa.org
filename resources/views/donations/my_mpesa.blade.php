<table class="table table-striped table-condensed table-bordered">
    <tr>
        <th>#</th>
        <th>Reference</th>
        <th>Amount(KES)</th>
        <th>Donor</th>
        <th>Phone</th>
        <th>Date</th>
    </tr>
    <?php $no = 1;  ?>
    @foreach($mpesa_donations as $donation)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $donation->transaction_reference }}</td>
            <td>{{ $donation->amount }}</td>
            <td>{{ $donation->first_name.' '.$donation->middle_name.' '.$donation->last_name }}</td>
            <td>{{ $donation->sender_phone }}</td>
            <td>{{ $donation->created_at }}</td>
        </tr>
        @endforeach
</table>