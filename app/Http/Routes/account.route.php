<?php
Route::group(['middleware'=>['web','auth']],function() {
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', 'AccountController@index');
        Route::get('/history/delete/{politic}', 'AccountController@deleteHistory');
        Route::post('/add_history', 'AccountController@saveHistory');
        Route::post('/profile_image', 'AccountController@profileImage');
        Route::post('/social_media', 'AccountController@socialMedia');
    });
});