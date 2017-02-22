@extends('layouts.gentella')
@section('title')
    Process {{ $user->name }} Withdrawal Request
@endsection
@section('content')
    <div class="col-md-8">
        <form class="form-horizontal" method="post">
            {{ csrf_field() }}
            <div class="alert alert-info" style="font-size:large;">
                @if( $withdrawal_request->method=='mpesa')
                    Please Send KES <strong>{{ number_format($withdrawal_request->amount,2) }}</strong> To:-<br/>
                    M-Pesa account: <strong>{{ $withdrawal_request->account }}</strong> Then enter the transaction code below for reference
                    @elseif( $withdrawal_request->method=='paypal')
               @endif
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Amount(KES)</label>
                <div class="col-md-6">
                    <input type="text" name="amount" class="form-control" disabled value="{{ number_format($withdrawal_request->amount,2) }}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Method</label>
                <div class="col-md-6">
                    <input type="text" name="amount" class="form-control" disabled value="{{ $withdrawal_request->method }}">
                </div>
            </div>
            @if( $withdrawal_request->method=='mpesa')
                <div class="form-group">
                    <label class="control-label col-md-3">Transaction code</label>
                    <div class="col-md-6">
                        <input type="text" name="transaction_code" class="form-control" required value="">
                    </div>
                </div>
            @endif
            <div class="form-group">
                <label class="control-label col-md-3">&nbsp;</label>
                <div class="col-md-6">
                    <input type="submit" name="submit" class="btn btn-primary" value="Process Now">
                </div>
            </div>

        </form>
    </div>
@endsection
