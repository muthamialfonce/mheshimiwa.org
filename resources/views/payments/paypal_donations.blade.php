@extends('layouts.gentella')
@section('title')
    Paypal Donations
@endsection
@section('content')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Amount(KES)</th>
            <th>Txn. Code</th>
            <th>Politician</th>
            <th>On</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @foreach($donations as $donation)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ number_format(round($donation->amount*$donation->rate,0),2) }}</td>
                <td>{{ $donation->txn_id }}</td>
                <td>{{ $donation->user->name }}</td>
                <td>{{ date('Y m d, H:i',strtotime($donation->created_at)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $donations->links() }}
@endsection
