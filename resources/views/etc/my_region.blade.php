<?php
$meta_description = "Get to know political aspirants from your region, Ranging from Governors, Senators, MP's,
MCA's and also Women Representatives
";
?>
@extends('layouts.colate')
@section('title')
    Region Leadership Search
@endsection
@section('content')
    <div style="visibility: visible; animation-name: fadeInDown;" class="get-started center wow fadeInDown animated">
        <h2>Get to know political aspirants from your region</h2>
        <p class="lead">
           Please fill in the form below and click proceed to get all the leadership positions in you region and also the respective candidates...
        <form class="form-horizontal" method="get">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-3">
                    <select onchange="checkCounty();" required name="region_id" class="form-control">
                        <option value="">Region</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select onchange="getCostituency()" required name="county_id" class="form-control">
                        <option value="">County</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select onchange="getWard();" required name="constituency_id" class="form-control">
                        <option value="">Constituency</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select required name="ward_id" class="form-control">
                        <option value="">Ward</option>
                    </select>
                </div>
                </div>
            <div class="form-group">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success">Proceed</button>
                </div>
            </div>

        </form>
        <script type="text/javascript">
            function checkCounty(){
                var region_id = $("select[name='region_id']").val();
                if(region_id){
                    var url = "{{ URL::to('user/get_counties') }}";
                    var data = {
                        region_id:region_id
                    };
                    $.get(url,data,function(response){
                        $("#county_group").slideDown('slow');
                        $("select[name='county_id']").html('<option value="">loading...</option>');
                        getCostituency();
                        getWard();
                        if(response){
                            $("select[name='county_id']").html('<option value="">County</option>');
                            counties = response;
                            for(var i =0;i<counties.length;i++){
                                var county = counties[i];
                                $("select[name='county_id']").append('<option value="'+county.id+'">'+county.name+'</option>');
                            }
                        }
                    });

                }else{
                    $("#county_group").slideUp();

                }
                runSanityCheck();
            }

            function getCostituency(){
                var county_id = $("select[name='county_id']").val();
                if(county_id){
                    var url = "{{ URL::to('user/get_constituencies') }}";
                    var data = {
                        county_id:county_id
                    };
                    $.get(url,data,function(response){
                        $("#constituency_group").slideDown('slow');
                        $("select[name='constituency_id']").html('<option value="">loading...</option>');
                        getWard();
                        if(response){
                            $("select[name='constituency_id']").html('<option value="">Constituency</option>');
                            counties = response;
                            for(var i =0;i<counties.length;i++){
                                var county = counties[i];
                                $("select[name='constituency_id']").append('<option value="'+county.id+'">'+county.name+'</option>');
                            }
                        }
                    });
                }else{
                    $("#constituency_group").slideUp();
                }
                runSanityCheck();
            }


            function getWard(){
                var constituency_id = $("select[name='constituency_id']").val();
                console.log(constituency_id);
                if(constituency_id){
                    var url = "{{ URL::to('user/get_wards') }}";
                    var data = {
                        constituency_id:constituency_id
                    };
                    $.get(url,data,function(response){
                        $("#ward_group").slideDown('slow');
                        $("select[name='ward_id']").html('<option value="">loading...</option>');
                        if(response){
                            $("select[name='ward_id']").html('<option value="">Ward</option>');
                            counties = response;
                            for(var i =0;i<counties.length;i++){
                                var county = counties[i];
                                $("select[name='ward_id']").append('<option value="'+county.id+'">'+county.name+'</option>');
                            }
                        }
                    });
                }else{
                    $("#ward_group").slideUp();
                }
                runSanityCheck();
            }

            function runSanityCheck(){
                var region_id = $("select[name='region_id']").val();
                if(!region_id){
                    $("select[name='county_id']").html('<option value="">County</option>');
                    $("#county_group").slideUp();
                    $("#constituency_group").slideUp();
                    $("#ward_group").slideUp();
                }
                var county_id = $("select[name='county_id']").val();
                if(!county_id){
                    $("select[name='constituency_id']").html('<option value="">Constituency</option>');
                    $("#constituency_group").slideUp();
                    $("#ward_group").slideUp();
                }
                var constituency_id = $("select[name='constituency_id']").val();
                if(!constituency_id){
                    $("select[name='ward_id']").html('<option value="">Ward</option>');
                    $("#ward_group").slideUp();
                }

            }
        </script>
        <br/>
        </p>
    </div>
    <br/>
@endsection
