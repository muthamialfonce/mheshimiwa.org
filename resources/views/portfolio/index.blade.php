@extends('layouts.gentella')
@section('title')
    Photo Gallery
@endsection
@section('content')
    <a href="#photo_modal" data-toggle="modal" class="btn btn-info"><i class="fa fa-plus"></i> New Photo</a>

    <div id="links">
        @foreach($portfolios as $portfolio)
        <a href="{{ URL::to($portfolio->image) }}" title="{{ URL::to($portfolio->description) }}" data-gallery>
            <img height="100px" width="150px" src="{{ URL::to($portfolio->image) }}" alt="{{ URL::to($portfolio->description) }}">
        </a>
       @endforeach
    </div>
    @include('portfolio.gallery_lib')
    @include('portfolio.file_modal')
@endsection
