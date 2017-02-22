@extends('layouts.gentella')
@section('title')
    Paypal Payment Succeeded
@endsection
@section('content')
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">Payment Details</div>
            <div class="panel-body">
                <div style="font-size: large;" class="alert alert-success">
                    You have successfully Paid Mheshimiwa account activation fee
                    <br/>
                    Your account is now live and members of the public can access it.
                    <br/>
                    To get a large number of followers and supporters, please check on <a href="#">Profile Improvement Strategies</a>
                </div>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Amount (KES)</th>
                        <td>{{ number_format($payment->amount*$payment->rate,2) }}</td>
                    </tr>
                    <tr>
                        <th>Payment Method</th>
                        <td>Paypal<i class="fa fa-paypal"></i> </td>
                    </tr>
                    <tr>
                        <th>Payer Email</th>
                        <td>{{ $payment->payer_email }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
