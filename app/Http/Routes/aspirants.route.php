<?php
Route::group(['middleware'=>['web','auth']],function(){

    Route::group(['prefix'=>'aspirants'],function(){
        Route::get("/{political_seat}","AspirantsController@getAspirants");
        Route::get("/view/all","AspirantsController@viewAll");
    });
});