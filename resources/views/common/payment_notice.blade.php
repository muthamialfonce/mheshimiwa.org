
    <div id="popup" style="font-size:large;font-weight: bold;" class="alert alert-warning">
        Hello {{ Auth::user()->name }} <br/>
        Your account is inactive and voters do not know that you are potential leader<br/>
        Please Pay Ksh. {{ number_format(Auth::user()->balance(),2) }} for your account to be activated<br/>
        You can pay with either Paypal (Visa & Mastercard Available) or M-Pesa
        <br/><br/>
        <strong>Please Click on your preferred paypment method</strong><br/>
        <a data-toggle="modal" href="#mpesa_request_modal" class="btn btn-default"><img src="{{ URL::to("img/mpesa.png") }}"></a> | <a class="btn btn-success" data-toggle="modal" href="#paypal_request_modal"><i class="fa fa-paypal"></i> Paypal</a>
    </div>

    <div class="modal fade" role="dialog" id="mpesa_request_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="pull-right btn btn-danger" data-dismiss="modal">&times;</button>
                    M-Pesa Payment Instructions
                </div>
                <div class="modal-body">
                    <ul>
                        <p>For M-PESA follow the steps below;</p>
                        <p class="alert alert-info-mpesa"><strong>
                                <img src="{{ URL::to("img/mpesa.png") }}" width="15%">
                                Use the M-pesa account for no. {{ Auth::user()->phone }}</strong></p>
                        <p>1. Select <b>"Lipa na M-PESA"</b> from the M-PESA menu</p>
                        <p>2. Select <b>“Buy Goods and Services”</b> from the "Lipa na M-PESA" menu</p>
                        <p>3. Enter the till number <b>177632</b></p>
                        <p>4. Enter the amount you want to top up</p>
                        <p>5. Enter your M-PESA PIN </p>
                        <p>6. Confirm that all details are correct and press ok</p>
                        <p>7. You will receive a confirmation from M-PESA.</p>
                        <!--
                        <p>8. Enter the Transaction ID from the sms in the designated field below.</p>
                                                    <p>9. Click Continue and place your order.</p>-->

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="paypal_request_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="pull-right btn btn-danger" data-dismiss="modal">&times;</button>
                    Paypal Payment Instructions
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{ URL::to("paypal/pay") }}">
                        {{ csrf_field() }}
                        <p class="form-group alert alert-info-mpesa">
                            <img src="{{ URL::to("http://florapubliclibrary.org/wp-content/uploads/2015/09/PayPal-logo-1.png") }}" width="25%">
                            <strong>Rate: </strong> 1 USD = KES. {{ env('USD_RATE',100) }}
                        </p>
                        <div class="form-group">
                            <label class="control-label col-md-3">Amount (KES):</label>
                            <div class="col-md-3">
                                <input type="text" disabled name="ksh_amt" value="{{ Auth::user()->balance() }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Amount (USD):</label>
                            <div class="col-md-3">
                                <input type="text" disabled name="usd_amt" value="{{ number_format(Auth::user()->balance()/env('USD_RATE',100),2) }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">&nbsp;</label>
                            <div class="col-md-8">
                                <input type="submit" onclick="" name="" class="btn btn-primary" value="Proceed">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        #popup{
            position:absolute;
            z-index:999;}
    </style>
