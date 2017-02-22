<div style="position:relative;height: 300px;">
    <div class="fill">
        <div class="text">
           {{ $user->profileCompletion() }}% Complete
        </div>
    </div>
    <img class="mask" src="https://static.licdn.com/scds/common/u/img/pic/pic_profile_strength_mask_90x90_v2.png">
</div>
<style type="text/css">
    .fill {
        position: absolute;
        top: 90px;
        left: 0;
        height: 0px;
        width: 90px;
        background-color: green;
    //overflow:hidden;
    }

    .mask {
        display: block;
        height: 90px;
        left: 0;
        position: absolute;
        top: 0;
        width: 90px;
        overflow: hidden;
        z-index: 1;
    }

    .text {
        position: absolute;
        left: 100%;
        top: -17px;
        z-index: 1;
        border-bottom: 1px solid #000;
        padding-left: 30px;
    }
</style>
<script>
    function fillMeter(percent) {
        var pixels = (percent/100) * 90;
        $(".fill").css('top', (90-pixels) + "px");
        $(".fill").css('height', pixels + "px");
    }
    fillMeter({{ $user->profileCompletion() }});
</script>


