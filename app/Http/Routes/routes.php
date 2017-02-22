<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']],function() {
    Route::get('/pg-{slug}', 'HomeController@showPage');
    Route::get('/home', 'HomeController@index');
    Route::get('/about', 'HomeController@about');
    Route::get('/how-it-works', 'HomeController@workability');
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/region', 'HomeController@regionDetails');

    Route::group(['prefix'=>'view_politician'], function(){
        Route::get('/ldr_125{user}_{slug}','HomeController@politicianProfile');
    });

    Route::group(['prefix'=>'api'], function(){
        Route::get('/wards','HomeController@allWards');
        Route::get('/subscribe','HomeController@addSubscriber');
    });
});


    //silence is golden






