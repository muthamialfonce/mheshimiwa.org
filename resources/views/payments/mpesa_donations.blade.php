@extends('layouts.gentella')
@section('title')
    M-Pesa Donations
@endsection
@section('content')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Amount(KES)</th>
            <th>Txn. Code</th>
            <th>Phone</th>
            <th>Politician</th>
            <th>On</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @foreach($donations as $donation)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ number_format($donation->amount,2) }}</td>
                <td>{{ $donation->transaction_code }}</td>
                <td>{{ $donation->phone }}</td>
                <td>{{ $donation->user->name }}</td>
                <td>{{ date('Y m d, H:i',strtotime($donation->created_at)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $donations->links() }}
@endsection
