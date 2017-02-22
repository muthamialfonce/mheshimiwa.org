<?php
Route::group(['middleware'=>['web','auth']],function(){

    Route::group(["prefix"=>"rates"],function(){
        Route::get("/","RatesController@index");
        Route::post("/","RatesController@store");
        Route::get("/delete/{rate}","RatesController@delete");
    });
});