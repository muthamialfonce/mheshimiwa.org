<?php
Route::group(['middleware' => ['web','auth']], function () {

    Route::group(['prefix' => 'levels'], function () {
        Route::get('/', 'LevelsController@index');
        Route::post('/', 'LevelsController@store');
        Route::get('/delete/{level}', 'LevelsController@delete');
    });

    Route::group(['prefix' => 'seats'], function () {
        Route::get('/', 'SeatsController@index');
        Route::post('/', 'SeatsController@store');
        Route::get('/delete/{seat}', 'SeatsController@delete');
    });

    Route::group(['prefix' => 'parties'], function () {
        Route::get('/', 'PoliticalPartyController@index');
        Route::get('edit_add/{party}', 'PoliticalPartyController@partyForm');
        Route::post('edit_add/{party}', 'PoliticalPartyController@store');
        Route::get('edit_add', 'PoliticalPartyController@partyForm');
        Route::post('import', 'PoliticalPartyController@import');
        Route::post('edit_add', 'PoliticalPartyController@store');
        Route::get('/delete/{party}', 'PoliticalPartyController@delete');

        Route::group(['prefix'=>'view/{party}'],function(){
            Route::get('', 'PoliticalPartyController@viewParty');
            Route::post('', 'PoliticalPartyController@addManifesto');
            Route::get('/delete_manifesto/{manifesto}', 'PoliticalPartyController@deleteManifesto');
        });
    });
    Route::group(['prefix'=>'wards'],function(){
        Route::get('/', 'WardController@index');
        Route::post('/', 'WardController@store');
        Route::get('delete/{ward}', 'WardController@delete');
    });



});