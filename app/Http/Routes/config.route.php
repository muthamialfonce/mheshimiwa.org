<?php
Route::group(['middleware'=>['web','auth']],function() {

    Route::group(['prefix' => 'config'], function () {
        Route::get('/','ConfigurationController@index');
        Route::post('/','ConfigurationController@store');
    });
});