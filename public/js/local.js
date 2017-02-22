/**
 * Created by iankibet on 2016/03/19.
 */

/**
 * Check screen resize and toggle views
 */

$(window).resize(function(){
    var width = $(window).width();
    //console.log(width);
    if(width>750){
        $(".gridular").hide();
        $(".tabular").show();
    }else{
        $(".tabular").hide();
        $(".gridular").show();
    }
});
$(window).ready(function(){

    var width = $(window).width();
    //console.log(width);
    if(width>750){
        $(".gridular").hide();
        $(".tabular").show();
    }else{
        $(".tabular").hide();
        $(".gridular").show();
    }
});