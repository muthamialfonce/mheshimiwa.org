<?php
Route::group(['prefix'=>'user'],function(){
    Route::get('get_counties','HomeController@getCounties');
    Route::get('get_constituencies','HomeController@getConstituencies');
    Route::get('get_wards','HomeController@getWards');

});

Route::group(['middleware'=>['web']],function() {
    Route::group(['prefix'=>'user'],function(){
        Route::post('login','UserController@login');
        Route::get('complete_profile','UserController@completeProfile');
        Route::get('profile','UserController@profile');
        Route::post('complete_profile','UserController@saveProfile');
        Route::get('aspiring_position','UserController@completePolitic');
        Route::get('donations/{user}','UserController@userDonations');
        Route::get('donations/{user}/process/{request_id}','UserController@processWithdrawal');
        Route::post('donations/{user}/process/{request_id}','UserController@processWithdrawal');
        Route::post('aspiring_position','UserController@savePolitic');
        Route::get('admins','UserController@getAdmins');
        Route::get('editors','UserController@getEditors');
    });
    Route::group(['prefix'=>'agendas'],function(){
        Route::get('/','AgendaController@index');
        Route::post('/','AgendaController@store');
        Route::get('/delete/{agenda}','AgendaController@delete');
    });
});
Route::group(['middleware'=>['web']],function() {
    Route::group(['prefix'=>'user'],function(){
        Route::post('change-role','UserController@changeRole');
    });
});