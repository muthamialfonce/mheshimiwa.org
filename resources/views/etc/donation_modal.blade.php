<div class="modal fade" role="dialog" id="donation_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="btn btn-danger pull-right" data-dismiss="modal">&times;</a>
                Donation Form
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="form-horizontal" method="post" action="{{ URL::to("donations/to/$leader->id") }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3">Amount(KES)</label>
                            <div class="col-md-5">
                                <input type="number" name="amount" min="10" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Your Name</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Phone</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">E-mail</label>
                            <div class="col-md-5">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Region</label>
                            <div class="col-md-5">
                                <?php
                                $regions = \App\Region::all();
                                ?>
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
                        <div class="form-group">
                            <label class="control-label col-md-3">Pay Via</label>
                            <div class="cc-selector-2 col-md-5">
                                <select class="form-control" name="via">
                                    <option value="paypal">Paypal</option>
                                    <option value="mpesa">M-Pesa</option>
                                </select>
                            </div>
                            {{--<div class="cc-selector-2 col-md-5">--}}
                                {{--<input checked="checked" id="visa2" type="radio" name="via" value="paypal" />--}}
                                {{--<label class="drinkcard-cc paypal" for="visa2"></label>--}}
                            {{--</div>--}}
                            {{--<div class="cc-selector-2 col-md-5">--}}
                                {{--<input  id="mastercard2" type="radio" name="via" value="mpesa" />--}}
                                {{--<label class="drinkcard-cc skrill"for="mastercard2"></label>--}}
                            {{--</div>--}}
                        </div>
                        <div id="" style="" class="form-group">
                            <label class="control-label col-md-3">&nbsp;</label>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Donate Now</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
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
    function validateForm(){
        var amount = $("input[name='amount']").val();
        amount = parseFloat(amount);
        if(isFloat(amount) || isInt(amount)){
            $(".amt").removeClass('has-error');
            $("#amt_error").html('');
        }else{
            $(".amt").addClass('has-error');
            $("#amt_error").html('Invalid amount');
            return false;
        }
    }
    function isInt(x) {
        return !isNaN(x) && eval(x).toString().length == parseInt(eval(x)).toString().length
    }
    function isFloat(x) {
        return !isNaN(x) && !isInt(eval(x)) && x.toString().length > 0
    }
</script>
<style type="text/css">
    .cc-selector input{
        margin:0;padding:0;
        -webkit-appearance:none;
        -moz-appearance:none;
        appearance:none;
    }

    .cc-selector-2 input{
        position:absolute;
        z-index:999;
    }

    .skrill{background-image:url({{ URL::to('img/mpesa_img.jpg') }});}
    .paypal{background-image:url({{ URL::to('img/paypal_all.png') }});}

    .cc-selector-2 input:active +.drinkcard-cc, .cc-selector input:active +.drinkcard-cc{opacity: .9;}
    .cc-selector-2 input:checked +.drinkcard-cc, .cc-selector input:checked +.drinkcard-cc{
        -webkit-filter: none;
        -moz-filter: none;
        filter: none;
    }
    .drinkcard-cc{
        cursor:pointer;
        background-size:contain;
        background-repeat:no-repeat;
        display:inline-block;
        width:200px;height:100px;
        -webkit-transition: all 100ms ease-in;
        -moz-transition: all 100ms ease-in;
        transition: all 100ms ease-in;
        -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
        -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
        filter: brightness(1.2) grayscale(.5) opacity(.9);
    }
    .drinkcard-cc:hover{
        -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
        -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
        filter: brightness(1.2) grayscale(.5) opacity(.9);
    }


</style>