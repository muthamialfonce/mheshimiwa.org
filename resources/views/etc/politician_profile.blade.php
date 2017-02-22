<?php
$politic = $leader->getInterestedSeat();
$party = \App\PoliticalParty::find($politic->political_party_id);
$seat = \App\PoliticalSeat::find($politic->political_seat_id);
$meta_description="Vying for ".$seat->name.",using party ".$party->name."(".$party->abbreviation.") From
".$leader->profile->county->name." County, ".$leader->profile->constituency->name." Constituency, ".$leader->profile->ward->name." Ward. 
$politic->comments";
        $meta_image = $leader->image=='' ? URL::to("client1.png"):URL::to($leader->image);
?>
@extends('layouts.colate')
@section('title')
   {{ ucwords($leader->name) }}
@endsection
@section('content')
    <div class="col-md-12">
        <div class="">
            <div class="panel-body">
                <div class="col-md-4 wow animated fadeInDown">
                    <table class="table table-condensed table-bordered">
                        <tr class="clients-comments text-center">
                            <td colspan="2">
                                <img src="{{ $leader->image=='' ? URL::to("client1.png"):URL::to($leader->image) }}" class="img-circle" alt="">
                                <h4><span>{{ $leader->name }}</span></h4>
                                <h4>{{ $politic->comments }}</h4>
                            </td>
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
                 <div style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;" class="col-md-6 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="feature-wrap">
                        <i class="fa fa-money"></i>
                        <h2>Donations</h2>
                        <p>If you know that {{ $leader->name }} is capable of leading the people well, Please donate a small amount to facilitate the heavy cost of campaigning
                        <a href="#donation_modal" data-toggle="modal" class="btn btn-success">Donate</a>
                        </p>
                    </div>
                </div>
                <div style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;" class="col-md-6 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="feature-wrap">
                        <i class="fa fa-bullhorn"></i>
                        <h2>Agendas</h2>

                        {{ count($agendas)<1 ? "Not Available":"" }}
                        @if( count($agendas)>0)
                            <?php $no = 1;  ?>
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
                <div style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;" class="col-md-6 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="feature-wrap">
                        <i class="fa fa-clock-o"></i>
                        <h2>Upcoming Events</h2>
                        @if( count($events)>0)
                            <table class="table table-condensed table-bordered">
                                <tr>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Place</th>
                                    <th>About</th>
                                </tr>
                                @foreach($events as $event)
                                    <tr>
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
                <div style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;" class="col-md-6 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="feature-wrap">
                        <i class="fa fa-clock-o"></i>
                        <h2>Work Experience</h2>
                        @if( count($experiences)>0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Company/Org.</th>
                                    <th>Position</th>
                                    <th>Experience Description</th>
                                    <th>From</th>
                                    <th>To</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($experiences as $experience)
                                    <tr>
                                        <td>{{ $experience->place }}</td>
                                        <td>{{ $experience->name }}</td>
                                        <td>{{ $experience->description }}</td>
                                        <td>{{ $experience->datefrom }}</td>
                                        <td>{{ $experience->dateto }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        {{ count($experiences)<1 ? "Not Available":"" }}
                    </div>
                </div>
                <div style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;" class="col-md-6 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="feature-wrap">
                        <i class="fa fa-globe"></i>
                        <h2>Political History</h2>
                        @if( count($histories)>0)
                            <table class="table table-condensed table-bordered">
                                <tr>
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
                <div style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;" class="col-md-6 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="feature-wrap">
                        <i class="fa fa-graduation-cap"></i>
                        <h2>Education Background</h2>
                        @if( count($educationlevels)>0)
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Level</th>
                                <th>Institution Name</th>
                                <th>Period</th>
                                <th>Achievement</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($educationlevels as $educationlevel)
                                <tr>
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
                <div class="col-md-12">
                    <div style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;" class="wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-comments-o"></i>
                            <h2>Your Say</h2>
                            <div id="comments_div" class="row col-md-10">
                                @foreach($comments as $comment)
                                    <div  style="padding: 10px;">
                                        <div class="row">
                                            <blockquote class="testimonial">
                                                <p>
                                                    {{ $comment->comment }}
                                                </p>
                                            </blockquote>
                                            <div class="arrow-down"></div>
                                            <p class="testimonial-author">{{ $comment->name }} | <span>{{ date('d/m/Y, h:i a',strtotime($comment->created_at)) }}</span></p>
                                        </div>
                                    </div>
                                @endforeach
                                    <form id="comment_form" onsubmit="return postComment();" style="margin-left:0px;" action="{{ URL::to("comments/profile/add/$leader->id") }}" class="form-horizontal col-md-10">
                                        <h2>Tell {{ $leader->name }} Something..</h2>
                                        <div class="form-group">
                                            <input type="hidden" name="id">
                                            <input type="hidden" name="ward_id" value="{{ $leader->profile->ward->id or 'n/a' }}">
                                            <input required type="email" class="form-control" name="email" placeholder="Email*">
                                        </div>
                                        <div class="form-group">
                                            <input required type="text" class="form-control" placeholder="Your Name*" name="name">
                                        </div>
                                        <div class="form-group">
                                            <textarea required class="form-control" name="comment"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button  type="submit" class="btn btn-default btn-sm" oncanplay="Comment*">Post</button>
                                        </div>
                                    </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('etc.donation_modal')
    <script type="text/javascript">
        function postComment(){
            var data = $("#comment_form").serialize();
            var url = $("#comment_form").attr('action');
            $.get(url,data,function(response){
                $("textarea[name='comment']").val('');
                $("#comments_div").html(response);
            });
            return false;
        }

        function displayComments(comments){
            for(var i=0;i<comments.length;i++){
                var comment = comments[i];
                console.log(comment);
            }
        }
    </script>
    <style type="text/css">
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            margin: auto;
        }
        .testimonial {
            margin: 0;
            background: #B7EDFF;
            padding: 10px 50px;
            position: relative;
            font-family: Georgia, serif;
            color: #666;
            border-radius: 5px;
            font-style: italic;
            text-shadow: 0 1px 0 #ECFBFF;
            background-image: linear-gradient(#CEF3FF, #B7EDFF);
        }

        .testimonial:before, .testimonial:after {
            content: "\201C";
            position: absolute;
            font-size: 80px;
            line-height: 1;
            color: #999;
            font-style: normal;
        }

        .testimonial:before {
            top: 0;
            left: 10px;
        }
        .testimonial:after {
            content: "\201D";
            right: 10px;
            bottom: -0.5em;
        }
        .arrow-down {
            width: 0;
            height: 0;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-top: 15px solid #B7EDFF;
            margin: 0 0 0 25px;
        }
        .testimonial-author {
            margin: 0 0 0 25px;
            font-family: Arial, Helvetica, sans-serif;
            color: #999;
            text-align:left;
        }
        .testimonial-author span {
            font-size: 12px;
            color: #666;
        }
        .body-style
        {

            border: #A23EF9;
            border-style: solid;
            border-radius: 10px;
            -webkit-box-shadow:0 0 20px blue;
            -moz-box-shadow: 0 0 20px blue;
            box-shadow:0 0 20px blue;
        }
        .body
        {
            padding-top: 0%;
            padding-bottom: 3%;
            padding-left: 5%;
            padding-right: 5%;
        }
    </style>
@endsection
