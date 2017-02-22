@extends('layouts.colate')
@section('title')
    {{ $region->name }} Candidates
@endsection
@section('content')
    <div style="visibility: visible; animation-name: fadeInDown;" class="get-started center wow fadeInDown animated">
        <h2>{{ ucfirst(strtolower($county->name)) }} County</h2>
        <p class="lead">
        All Candidates with respect to the chosen regions
        </div>
    <br/>
    @foreach($results as $result)
        <div style="visibility: visible; animation-name: fadeInDown;" class="clients-area center wow fadeInDown animated">
            <h2>{{ ucwords($result['label']) }} Aspirants</h2>
            <p class="lead">
                Here is a list of all aspiring {{ ucwords($result['label']) }} position candidates
            </p>
        </div>
        <div class="row">
            @foreach($result['data'] as $leader)
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
                        <h3>{{ $leader->name }}</h3>
                        <p>
                            <strong>Party:</strong><span title="{{ $leader->party }}">{{ $leader->abbrev }}</span><br/>
                            <strong>Seat:</strong><span title="{{ $leader->seat }}">{{ $leader->seat }}</span><br/>
                            {{ $leader->tagline }}
                        </p>
                        <a class="readmore" href="{{ URL::to("view_politician/ldr_125$leader->id".'_'.urlencode($leader->name)) }}">More...</a>
                    </div>
                </div>
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
            @endforeach
        </div>
        @endforeach
@endsection
