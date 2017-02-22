<?php
Route::group(['middleware'=>['web','auth']],function() {
    Route::group(['prefix'=>'events'],function(){
        Route::get('/','PoliticalEventsController@index');
        Route::post('/','PoliticalEventsController@store');
        Route::get('delete/{political_event}','PoliticalEventsController@delete');
    });
});