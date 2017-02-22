@extends('layouts.gentella')

@section('title')
    Profile Comments
@endsection

@section('content')
        <ul class="nav nav-tabs">
            <li class="{{ count(Request::all())==0 ? "active":"" }}">
                <a class="" href="{{ Request::url() }}">Pending</a>
            </li>
            <li class="{{ count(Request::all())>0 ? "active":"" }}">
                <a href="{{ Request::url().'?view=approved' }}">Approved</a>
            </li>
        </ul>
<br/>
    <div class="tab-content">
        @if(count(Request::all()) > 0 )
            @include('comments.approved')
            @else
            @include('comments.unapproved')
        @endif
    </div>
@endsection
