@extends('layouts.gentella')
@section('title')
    Party Form
@endsection
@section('content')
    <form class="form-horizontal" method="post">
        <input type="hidden" name="id" value="{{ $party->id }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-md-3">Name</label>
            <div class="col-md-5">
                <input required type="text" value="{{ $party->name }}" name="name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Abbreviation</label>
            <div class="col-md-5">
                <input required type="text" value="{{ $party->abbreviation }}" name="abbreviation" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Slogan</label>
            <div class="col-md-5">
                <input required type="text" value="{{ $party->slogan }}" name="slogan" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Year Founded</label>
            <div class="col-md-5">
                <input required type="text" value="{{ $party->year_founded }}" name="year_founded" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">About</label>
            <div class="col-md-5">
                <textarea rows="10" required name="about" class="form-control">{{ $party->about }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">&nbsp;</label>
            <div class=" col-md-5">
                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
    </form>
@endsection
