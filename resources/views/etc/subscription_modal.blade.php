    <div class="modal fade" role="dialog" id="subscription_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <a data-dismiss="modal" class="btn btn-danger pull-right">&times;</a>
                        <h4>Subscription Form</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body" style="background-color: #F3F3F3;">
                            <div style="display:none;" id="subscriber_status" class="alert alert-info">You have successfully subscribed</div>
                            <form id="subscription_form_sm" onsubmit="return addSubscriber();" class="form-horizontal row" method="get" action="{{ URL::to('api/subscribe') }}">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Email*</label>
                                    <div class="col-md-5">
                                        <input type="email" required name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Name*</label>
                                    <div class="col-md-5">
                                        <input type="text" required name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Phone</label>
                                    <div class="col-md-5">
                                        <input type="" required name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Region</label>
                                    <div class="col-md-5">
                                        <?php
                                        $regions = \App\Region::all();
                                        ?>
                                        <select onchange="checkCounty();" required name="region_id" class="form-control region_id">
                                            <option value="">Select..</option>
                                            @foreach($regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="" style="display:none;" class="form-group county_group">
                                    <label class="control-label col-md-3">County</label>
                                    <div class="col-md-5">
                                        <select onchange="getCostituency()" required name="county_id" class="form-control county_id">

                                        </select>
                                    </div>
                                </div>
                                <div id="" style="display:none;" class="form-group constituency_group">
                                    <label class="control-label col-md-3">Constituency</label>
                                    <div class="col-md-5">
                                        <select onchange="getWard();" required name="constituency_id" class="form-control constituency_id">

                                        </select>
                                    </div>
                                </div>
                                <div id="" style="display:none;" class="form-group ward_group">
                                    <label class="control-label col-md-3">Ward</label>
                                    <div class="col-md-5">
                                        <select required name="ward_id" class="form-control ward_id">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">&nbsp;</label>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-thumbs-up"></i> Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    function addSubscriber(){
        var data = $("#subscription_form_sm").serialize();
        var url = '{{ URL::to('api/subscribe') }}';
        $.get(url,data,function(subscriber){
            $("#subscriber_status").slideDown('slow');
            $("#subscription_form_sm").find("input[type=text], textarea").val("");
            $("#subscription_form_sm").slideUp('slow');
        });
        return false;
    }
</script>
    <script type="text/javascript">
        function checkCounty(){
            var region_id = $(".region_id").val();
            if(region_id){
                var url = "{{ URL::to('user/get_counties') }}";
                var data = {
                    region_id:region_id
                };
                $.get(url,data,function(response){
                    $(".county_group").slideDown('slow');
                    $(".county_id").html('<option value="">loading...</option>');
                    getCostituency();
                    getWard();
                    if(response){
                        $(".county_id").html('<option value="">Select..</option>');
                        counties = response;
                        for(var i =0;i<counties.length;i++){
                            var county = counties[i];
                            $(".county_id").append('<option value="'+county.id+'">'+county.name+'</option>');
                        }
                    }
                });

            }else{
                $(".county_group").slideUp();

            }
            runSanityCheck();
        }

        function getCostituency(){
            var county_id = $(".county_id").val();
            if(county_id){
                var url = "{{ URL::to('user/get_constituencies') }}";
                var data = {
                    county_id:county_id
                };
                $.get(url,data,function(response){
                    $(".constituency_group").slideDown('slow');
                    $(".constituency_id").html('<option value="">loading...</option>');
                    getWard();
                    if(response){
                        $(".constituency_id").html('<option value="">Select..</option>');
                        counties = response;
                        for(var i =0;i<counties.length;i++){
                            var county = counties[i];
                            $(".constituency_id").append('<option value="'+county.id+'">'+county.name+'</option>');
                        }
                    }
                });
            }else{
                $(".constituency_group").slideUp();
            }
            runSanityCheck();
        }


        function getWard(){
            var constituency_id = $(".constituency_id").val();
            console.log(constituency_id);
            if(constituency_id){
                var url = "{{ URL::to('user/get_wards') }}";
                var data = {
                    constituency_id:constituency_id
                };
                $.get(url,data,function(response){
                    $(".ward_group").slideDown('slow');
                    $(".ward_id").html('<option value="">loading...</option>');
                    if(response){
                        $(".ward_id").html('<option value="">Select..</option>');
                        counties = response;
                        for(var i =0;i<counties.length;i++){
                            var county = counties[i];
                            $(".ward_id").append('<option value="'+county.id+'">'+county.name+'</option>');
                        }
                    }
                });
            }else{
                $(".ward_group").slideUp();
            }
            runSanityCheck();
        }

        function runSanityCheck(){
            var region_id = $(".region_id").val();
            if(!region_id){
                $(".county_id").html('<option value=""></option>');
                $(".county_group").slideUp();
                $(".constituency_group").slideUp();
                $(".ward_group").slideUp();
            }
            var county_id = $(".county_id").val();
            if(!county_id){
                $(".constituency_id").html('<option value=""></option>');
                $(".constituency_group").slideUp();
                $(".ward_group").slideUp();
            }
            var constituency_id = $(".constituency_id").val();
            if(!constituency_id){
                $(".ward_id").html('<option value=""></option>');
                $(".ward_group").slideUp();
            }

        }
        function validateForm(){
            var amount = $("input[name='amount']").val();
            amount = parseFloat(amount);
            if(isFloat(amount) || isInt(amount)){
                $(".amt").removeClass('has-error');
                $(".amt_error").html('');
            }else{
                $(".amt").addClass('has-error');
                $(".amt_error").html('Invalid amount');
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