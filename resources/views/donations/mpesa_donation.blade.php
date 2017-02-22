@extends('layouts.colate')
@section('title')
    M-Pesa Donation Form
@endsection
@section('content')
    <?php
    $donor = $subscriber;
    ?>
    <div style="visibility: visible; animation-name: fadeInDown;" class="get-started center wow fadeInDown animated">
        <h2>Donate to {{ $user->name }}</h2>
        <br/>
        <strong></strong>
        <div class="row">
            <ol class="float-left">
                <li>For M-PESA follow the steps below;</li>
                <p class="alert alert-info-mpesa"><strong>
                        <img src="{{ URL::to("img/mpesa.png") }}" width="15%">
                        Use the M-pesa account for no. {{ $donor->phone }}</strong></p>
                <li>Select <b>"Lipa na M-PESA"</b> from the M-PESA menu</li>
                <li>Select <b>“Buy Goods and Services”</b> from the "Lipa na M-PESA" menu</li>
                <li>Enter the till number <b>177632</b></li>
                <li>Enter the amount <strong>{{ $amount }}</strong></li>
                <li>Enter your M-PESA PIN </li>
                <li>Confirm that all details are correct and press ok</li>
                <li>You will receive a confirmation from M-PESA.</li>
                <li>Enter the Transaction ID from the sms in the designated field below.</li>
               <li>
                   <p class="alert">
                   <form class="" method="post">
                       {{ csrf_field() }}
                       <div class="form-group {{ $errors->has('code') ? " has-error":"" }}">
                               <input type="hidden" name="amount" value="{{ $amount }}">
                                <label class="col-md-3 control-label">&nbsp;</label>
                               <div class="col-md-6">
                                   <input type="text" class="form-control" name="code">
                                   @if ($errors->has('code'))
                                       <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                   @endif
                                   <button class="btn btn-info"><i class="fa fa-check"></i> Proceed</button>
                               </div>
                       </div>
                   </form>
                   </p>

               </li>
            </ol>

        </div>

    </div>
@endsection
