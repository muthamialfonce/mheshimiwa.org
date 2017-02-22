<div class="col-md-4">
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Total Donations (KES)</th>
            <td>{{ number_format($total = $user->totalDonations(),2) }}</td>
        </tr>
        <tr>
            <th>Service Fee</th>
            <td>{{ number_format($fee = $user->donationFee(),2) }}</td>
        </tr>
        <tr>
            <th>Withdrawn</th>
            <td>{{ number_format($withdrawn = $user->withdrawnAmount(),2) }}</td>
        </tr>
        <tr>
            <?php $available = $total-($fee+$withdrawn)  ?>
            <th>Available</th>
            <td>{{number_format($available,2) }}</td>
        </tr>
    </table>
</div>
<?php
    $min_amount = $config['min_withdrawal_amount']->amount;
?>
<div class="row"></div>
@if(Auth::user()->id == $user->id && $user->totalDonations()>$min_amount)
    <a href="#withdrawal_modal" data-toggle="modal" class="btn btn-info"><i class="fa fa-download"></i> Withdraw</a>
@endif
<br/>
<ul class="nav nav-tabs">
    <li class="{{ count(Request::all())==0 ? "active":"" }}">
        <a href="{{ Request::url() }}">M-pesa</a>
    </li>
    <li class="{{ count(Request::all())==1 ? "active":"" }}">
        <a href="{{ URL::to(Request::url()."?view=paypal") }}">Paypal</a>
    </li>
</ul>

<div class="tab-content">
    @if(count(Request::all())==0)
        @include('donations.my_mpesa')
    @else
        @include('donations.my_paypal')
    @endif
</div>
<div class="modal fade" role="dialog" id="withdrawal_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <a data-dismiss="modal" class="btn btn-danger pull-right">&times;</a>
                    <h4>Withdrawal Request Form</h4>
                </div>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="{{ URL::to("my_donations/withdraw") }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3">Amount</label>
                        <div class="col-md-6">
                            <input type="number" min="{{ $min_amount }}" value="{{ round($available,0) }}" required class="form-control" name="amount" max="{{ round($user->totalDonations(),0) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Method</label>
                        <div class="col-md-6">
                            <select onchange="changeMethod();" name="method" class="form-control">
                                <option value="mpesa">M-Pesa</option>
                                <option value="paypal">Paypal</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="acc_group" style="">
                        <label id="email_group" class="control-label col-md-3">Paypal Email</label>
                        <div class="col-md-6">
                            <input required type="text" name="account" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">&nbsp;</label>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-success" value="Submit">
                        </div>
                    </div>
                </form>
                <script type="text/javascript">
                    changeMethod();
                    function changeMethod(){
                        $("input[name='account']").val('');
                        $("#acc_group").slideUp();
                        $("#acc_group").slideDown();
                        var selected = $("select[name='method']").val();
                        if(selected=='paypal'){
                            $("#email_group").html('Paypal Email');
                        }else{
                            $("#email_group").html('Mpesa Phone');
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</div>