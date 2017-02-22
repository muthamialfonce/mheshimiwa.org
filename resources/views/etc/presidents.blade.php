<?php
$qry = \App\User::join('politics','politics.user_id','=','users.id');
$qry->join('political_parties','politics.political_party_id','=','political_parties.id');
$qry->join('political_seats','politics.political_seat_id','=','political_seats.id');
$qry->select("users.*","politics.comments as tagline","political_parties.name as party","political_seats.name as seat","political_parties.abbreviation as abbrev");
$qry->where([
        ['users.approved','=',1],
   ['politics.status','=',0],

        // ['political_seats.rank','=',1]
]);
$leaders = $qry->get();
$ld_count = 0;
?>
<div class="row"></div>
    @foreach($leaders as $leader)
        <?php $ld_count++ ?>
        {{--<div style="visibility: visible; animation-name: fadeInDown;" class="col-md-4 wow fadeInDown animated">--}}
            {{--<div class="clients-comments text-center">--}}
                {{--<img src="{{ $leader->image=='' ? URL::to("client1.png"):URL::to($leader->image) }}" class="img-circle" alt="">--}}
                {{--<h3>{{ $leader->tagline }}</h3>--}}
                {{--<h4>{{ $leader->party.'('.$leader->abbrev.')' }}</h4>--}}
                {{--<h4><span>{{ $leader->name }}</h4>--}}
                {{--<h4><span>For:</span>{{ $leader->seat }}</h4>--}}
                {{--<a href="{{ URL::to("view_politician/$leader->id") }}" class="btn btn-info"><i class="fa fa-info"></i> More..</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="minicontent">
            <div class="miniimage">
                <img src="{{ $leader->image=='' ? URL::to("client1.png"):URL::to($leader->image) }}">
                <div class="entry-top-details">
                    <div class="entrydate">
                        {{ date('M d, Y',strtotime($leader->created_at)) }}
                    </div>
                    <div class="entrymore">
                        <a class="" href="{{ URL::to("view_politician/ldr_125$leader->id".'_'.urlencode($leader->name)) }}">View Profile</a>
                    </div>
                </div>
            </div>
            <div class="miniexcerpt">
                <h3>{{ ucwords($leader->name) }}</h3>
                <p>
                    <strong>Party:</strong><span title="{{ $leader->party }}">{{ $leader->abbrev }}</span><br/>
                    <strong>Seat:</strong><span title="{{ $leader->seat }}">{{ $leader->seat }}</span><br/>
                    {{ $leader->tagline }}
                </p>
                <a class="readmore" href="{{ URL::to("view_politician/ldr_125$leader->id".'_'.urlencode($leader->name)) }}">More...</a>
            </div>
        </div>
        @if($ld_count%3==0)
            <div class="row"></div>
            @endif
    @endforeach
