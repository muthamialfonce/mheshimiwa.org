<?php
Route::group(['middleware'=>['web','auth']],function() {
    Route::group(['prefix'=>'wards'],function(){
        Route::get('/wards','WardController@index');
        Route::post('/ward', 'WardController@store');
        Route::delete('/ward/{ward}', 'WardController@destroy');
        Route::get('/ward/edit/{ward}','WardController@edit');
    });

    Route::get('/import', 'RegionController@import');
    Route::post('/import', 'RegionController@import');
    /*
     * Region Management
     *
     */
    Route::group(['prefix'=>'regions'],function(){
        Route::get('/', 'RegionController@index');
        Route::get('/delete/{region}', 'RegionController@delete');
        Route::post('/', 'RegionController@store');
        Route::delete('/{region}', 'RegionController@destroy');
        Route::post('/{region}', ['as' =>'regions.update','uses' => 'RegionController@update']);
    });

    /*
     * County management
     */
    Route::group(['prefix'=>'counties'],function(){
        Route::get('/', 'CountyController@index');
        Route::post('/', 'CountyController@store');
        Route::get('/delete/{county}', 'CountyController@delete');
    });

    Route::group(['prefix'=>'constituencies'],function(){
        Route::get('/', 'ConstituencyController@index');
        Route::post('/', 'ConstituencyController@store');
        Route::get('delete/{constituency}', 'ConstituencyController@delete');
    });
});