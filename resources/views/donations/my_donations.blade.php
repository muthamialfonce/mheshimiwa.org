@extends('layouts.gentella')

@section('title')
    {{ $user->name }} Donations
@endsection
@section('content')
    @include('donations.user_donations')
    @include('donations.withdrawal_requests')
@endsection
