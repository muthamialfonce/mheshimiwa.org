<?php
/**
 * Created by PhpStorm.
 * User: iankibet
 * Date: 2016/07/15
 * Time: 10:55 AM
 */
Route::group(['middleware'=>['web','auth']],function() {

    Route::group(['prefix'=>'pages'],function(){
       Route::get('/','PagesController@index');
       Route::get('/add','PagesController@addPage');
       Route::get('/delete/{page}','PagesController@deletePage');
       Route::get('/edit/{page}','PagesController@editPage');
       Route::post('/add','PagesController@store');
    });
});