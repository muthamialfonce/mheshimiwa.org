@extends('layouts.gentella')
@section('title')
    Aspiring Leadership Position
@endsection
@section('content')
    <div class="alert alert-info">Please let the members of the public know the political position you are vying for.</div>
    <form class="form-horizontal" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="id" value="{{ @$aspiring->id }}">
            <label class="control-label col-md-3">Position</label>
            <div class="col-md-4">
                <select required name="political_seat_id" class="form-control">
                    <option value="">Select</option>
                    @foreach($seats as $seat)
                        <option {{ $seat->id==@$aspiring->political_seat_id ? "selected":"" }} value="{{ $seat->id }}">{{ $seat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Political Party</label>
            <div class="col-md-4">
                <select required name="political_party_id" class="form-control">
                    <option value="">Select</option>
                    @foreach($parties as $party)
                        <option {{ $party->id==@$aspiring->political_party_id ? "selected":"" }} value="{{ $party->id }}">{{ $party->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{--<div id="custom_party">--}}
            {{--<div class="form-group">--}}
                {{--<label class="col-md-3 form-control">Party Name</label>--}}
                {{--<div class="col-md-4">--}}
                    {{--<input type="text" class="form-control" name="party_name">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<label class="col-md-3 form-control">Abbreviation</label>--}}
                {{--<div class="col-md-4">--}}
                    {{--<input type="text" class="form-control" placeholder="Like O.D.M" name="abbreviation">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group">
            <label class="control-label col-md-3">Tagline</label>
            <div class="col-md-4">
                <textarea placeholder="Say something.." class="form-control" name="comments">{{ $aspiring->comments }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">&nbsp;</label>
            <div class="col-md-4">
               <button class="btn btn-success" type="submit"><i class="a fa-save"></i> Save</button>
            </div>
        </div>
    </form>
    <script type="text/javascript">

    </script>
@endsection