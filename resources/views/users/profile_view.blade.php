@extends('layouts.gentella')
@section('title')
    {{ $leader->name.' Profile' }}
@endsection
@section('content')
    <?php
    $politic = $leader->getInterestedSeat();
    $party = \App\PoliticalParty::find($politic->political_party_id);
    $seat = \App\PoliticalSeat::find($politic->political_seat_id);
    
    ?>
    <div class="col-md-10 panel panel-default">
        <div class="panel-body">
            @if($leader->approved==0)
                <a onclick="return confirm('Are you sure?');" href="{{ URL::to("profile/approve/$leader->id") }}" class="btn btn-success"><i class="fa fa-check"></i> Approve</a>
            @elseif($leader->approved==1)
                <a onclick="return confirm('Are you sure?');" href="{{ URL::to("profile/disapprove/$leader->id") }}" class="btn btn-danger"><i class="fa fa-remove"></i> Disapprove</a>
            @endif

            <a class="btn btn-default btn-lg" href="{{ URL::to("user/donations/$leader->id") }}">Donations (KES: {{ number_format($leader->totalDonations(),2) }})</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Background Info</div>
            </div>
            <div class="panel-body">
                <table class="table table-condensed table-bordered">
                    <tr class="clients-comments text-center">
                        <td colspan="2">
                            <div style="" class="profile_pic">
                                <img style="width: 150px;height: 200px;" src="{{ $leader->image=='' ? URL::to("client1.png"):URL::to($leader->image) }}" class="img-circle profile_img" alt="">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h4>Name: <strong>{{ $leader->name }}</strong></h4>
                            <h4>{{ $politic->comments }}</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td>{{ $leader->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $leader->phone or 'n/a' }}</td>
                    </tr>
                    <tr>
                        <th>Vying For</th>
                        <td>{{ $seat->name}}</td>
                    </tr>
                    <tr>
                        <th>Party</th>
                        <td>{{ $party->name.'('.$party->abbreviation.')' }}</td>
                    </tr>
                    <tr>
                        <th>County</th>
                        <td>{{ $leader->profile->county->name or 'n/a' }}</td>
                    </tr>
                    <tr>
                        <th>Constituency</th>
                        <td>{{ $leader->profile->constituency->name or 'n/a' }}</td>
                    </tr>
                    <tr>
                        <th>Ward</th>
                        <td>{{ $leader->profile->ward->name or 'n/a' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Social Media</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            @if(isset($leader->facebook()->url))
                                <a target="_blank" href="{{ $leader->facebook()->url }}"><i style="color:#3B5998" class="fa fa-facebook fa-2x"></i></a>
                            @endif
                            @if(isset($leader->twitter()->url))
                                <a target="_blank" href="{{ $leader->twitter()->url }}"><i style="color:#54B1E0" class="fa fa-twitter fa-2x"></i></a>
                            @endif
                            @if(isset($leader->linkedIn()->url))
                                <a target="_blank" href="{{ $leader->linkedIn()->url }}"><i style="color:#1883BB" class="fa fa-linkedin fa-2x"></i></a>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Agendas</div>
            <div class="panel-body">
                {{ count($agendas)<1 ? "Not Available":"" }}
                <?php $no = 1;  ?>
                @if( count($agendas)>0)
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Agenda</th>
                            <th>More</th>
                        </tr>
                        @foreach($agendas as $agenda)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $agenda->title }}</td>
                                <td>{{ $agenda->description }}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">Events</div>
            <div class="panel-body">
                @if( count($events)>0)
                    <?php $no=1;  ?>
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Event</th>
                            <th>Date</th>
                            <th>Place</th>
                            <th>About</th>
                        </tr>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ date('d-M-Y h:i a',strtotime($event->event_time)) }}</td>
                                <td>{{ $event->place }}</td>
                                <td>{{ $event->about }}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
                {{ count($events)<1 ? "Not Available":"" }}
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">Political History</div>
            <div class="panel-body">
                @if( count($histories)>0)
                    <?php $no=1;  ?>
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Year</th>
                            <th>Party</th>
                            <th>Position</th>
                            <th>Comments</th>
                        </tr>
                        @foreach($histories as $history)
                            <?php
                            $party = \App\PoliticalParty::find($history->political_party_id);
                            $seat = \App\PoliticalSeat::find($history->political_seat_id);
                            ?>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $history->year.'-'.$history->ended }}</td>
                                <td>{{ $party->name.'('.$party->abbreviation.')' }}</td>
                                <td>{{ $seat->name }}</td>
                                <td>{{ $history->comments }}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
                {{ count($histories)<1 ? "Not Available":"" }}
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">Education Background</div>
            <div class="panel-body">
                @if( count($educationlevels)>0)
                    <?php $no=0;  ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Level</th>
                            <th>Institution Name</th>
                            <th>Period</th>
                            <th>Achievement</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($educationlevels as $educationlevel)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $educationlevel->academic_level->name }}</td>
                                <td>{{ $educationlevel->name }}</td>
                                <td>{{ $educationlevel->joined.'-'.$educationlevel->completed }}</td>
                                <td>{{ $educationlevel->achievement }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                {{ count($educationlevels)<1 ? "Not Available":"" }}
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">Paypal Payments</div>
            <div class="panel-body">
                @if( count($paypal_txns)>0)
                    <?php $no=0;  ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Amount</th>
                            <th>Txn Code</th>
                            <th>Payer Email</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paypal_txns as $paypal_txn)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $paypal_txn->amount }}</td>
                                <td>{{ $paypal_txn->txn_id }}</td>
                                <td>{{ $paypal_txn->payer_email }}</td>
                                <td>{{ $paypal_txn->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                {{ count($paypal_txns)<1 ? "Not Available":"" }}
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">Mpesa Payments</div>
            <div class="panel-body">
                @if( count($mpesa_payments)>0)
                    <?php $no=0;  ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Amount</th>
                            <th>Reference</th>
                            <th>Sender Phone</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mpesa_payments as $mpesa_payment)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $mpesa_payment->amount }}</td>
                                <td>{{ $mpesa_payment->transaction_reference }}</td>
                                <td>{{ $mpesa_payment->sender_phone }}</td>
                                <td>{{ $mpesa_payment->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                {{ count($mpesa_payments)<1 ? "Not Available":"" }}
            </div>
        </div>
    </div>
@endsection