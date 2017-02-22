<?php
Route::group(['middleware'=>['web','auth']],function() {

    Route::group(['prefix'=>'portfolio'],function(){
        Route::get('/','PortfolioController@index');
        Route::post('/add','PortfolioController@store');
    });

});