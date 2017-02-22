@extends('layouts.gentella')
@section('title')
    {{ $party->name }}
@endsection
@section('content')
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Primary Details</div>
            <div class="panel-body">
                <table class="table table-condensed table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $party->name }}</td>
                    </tr>
                    <tr>
                        <th>Abbreviation</th>
                        <td>{{ $party->abbreviation }}</td>
                    </tr>
                    <tr>
                        <th>Slogan</th>
                        <td>{{ $party->slogan }}</td>
                    </tr>
                    <tr>
                        <th>Year Founded</th>
                        <td>{{ $party->year_founded }}</td>
                    </tr>
                    <tr>
                        <th colspan="2">About</th>
                    </tr>
                    <tr>
                        <td colspan="2">{{ $party->about }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
