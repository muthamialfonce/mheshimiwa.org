<?php
Route::group(['middleware'=>['web']],function(){

    Route::group(['prefix'=>'comments'],function(){
        Route::group(['prefix'=>'profile'],function(){
            Route::get('/add/{user}','ProfileCommentsController@store');
            Route::get('/get_all/{user}','ProfileCommentsController@getComments');
        });
    });

    Route::group(['prefix'=>'profile_comments'],function(){
        Route::get('/','ProfileCommentsController@myComments');
        Route::get('/approve/{comment_id}','ProfileCommentsController@approve');
        Route::get('/disapprove/{comment_id}','ProfileCommentsController@disapprove');
        Route::get('/delete/{comment_id}','ProfileCommentsController@delete');
    });

});