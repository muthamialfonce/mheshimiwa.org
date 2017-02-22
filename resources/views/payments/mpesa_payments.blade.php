@extends('layouts.gentella')
@section('title')
    M-Pesa Payments
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
        @foreach($payments as $payment)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ number_format($payment->amount,2) }}</td>
                <td>{{ $payment->transaction_reference }}</td>
                <td>{{ $payment->sender_phone }}</td>
                <td>{{ $payment->name }}</td>
                <td>{{ date('Y m d, H:i',strtotime($payment->created_at)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $payments->links() }}
@endsection
