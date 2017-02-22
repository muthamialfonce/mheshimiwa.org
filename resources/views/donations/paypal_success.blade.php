@extends('layouts.colate')
@section('title')
    Successful Donation
@endsection
@section('content')
    <?php
    $donor = $donation->donor;
    ?>
    <div style="visibility: visible; animation-name: fadeInDown;" class="get-started center wow fadeInDown animated">
        <h2>Transaction Successful</h2>
        You have successfully donated KES {{ number_format(round($donation->amount*$donation->rate,0),2) }} to {{ $user->name }}.
        <br/>
        <strong>Transaction Details</strong>
        <div class="row">
            <div class="well well-lg center row">
                <table class="table table-condensed table-bordered">
                    <tr>
                        <th>Amount (KES)</th>
                        <td>{{ number_format(round($donation->amount*$donation->rate,0),2) }}</td>
                    </tr>
                    <tr>
                        <th>Via</th>
                        <td>Paypal</td>
                    </tr>
                    <tr>
                        <th>To</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>From</th>
                        <td>{{ $donor->name }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $donor->phone }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
@endsection
