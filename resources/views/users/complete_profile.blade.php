@extends('layouts.gentella')
@section('title')
    Background Information
@endsection
@section('content')
    <div class="alert alert-info">
        Please fill in your Background details for Voters to easily identify you.
    </div>
    <form class="form-horizontal" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-md-3">Region</label>
            <div class="col-md-5">
                <select onchange="checkCounty();" required name="region_id" class="form-control">
                    <option value="">Select..</option>
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div id="county_group" style="display:none;" class="form-group">
            <label class="control-label col-md-3">County</label>
            <div class="col-md-5">
                <select onchange="getCostituency()" required name="county_id" class="form-control">

                </select>
            </div>
        </div>
        <div id="constituency_group" style="display:none;" class="form-group">
            <label class="control-label col-md-3">Constituency</label>
            <div class="col-md-5">
                <select onchange="getWard();" required name="constituency_id" class="form-control">

                </select>
            </div>
        </div>
        <div id="ward_group" style="display:none;" class="form-group">
            <label class="control-label col-md-3">Ward</label>
            <div class="col-md-5">
                <select required name="ward_id" class="form-control">

                </select>
            </div>
        </div>
        <div id="" style="" class="form-group">
            <label class="control-label col-md-3">&nbsp;</label>
            <div class="col-md-5">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
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
                        $("select[name='county_id']").html('<option value="">Select..</option>');
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
                        $("select[name='constituency_id']").html('<option value="">Select..</option>');
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
                        $("select[name='ward_id']").html('<option value="">Select..</option>');
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
                $("select[name='county_id']").html('<option value=""></option>');
                $("#county_group").slideUp();
                $("#constituency_group").slideUp();
                $("#ward_group").slideUp();
            }
            var county_id = $("select[name='county_id']").val();
            if(!county_id){
                $("select[name='constituency_id']").html('<option value=""></option>');
                $("#constituency_group").slideUp();
                $("#ward_group").slideUp();
            }
            var constituency_id = $("select[name='constituency_id']").val();
            if(!constituency_id){
                $("select[name='ward_id']").html('<option value=""></option>');
                $("#ward_group").slideUp();
            }

        }
    </script>
@endsection