<?php
Route::group(['middleware' => ['web']], function () {

    Route::group(['prefix'=>'paypal'],function(){
        Route::post('/pay','PaypalController@prepare');
        Route::get('/cancel','PaypalController@cancel');
        Route::get('/charge','PaypalController@charge');
        Route::get('/success/{paypal_payment}','PaypalController@success');
    });

    Route::group(['prefix'=>'mpesa'],function(){
        Route::get('pay','MpesaController@pay');
    });

    Route::group(['prefix'=>'payments'],function(){
        Route::get('mpesa','PaymentsController@mpesaPayments');
        Route::get('paypal','PaymentsController@paypalPayments');
        Route::get('paypal-donations','PaymentsController@paypalDonations');
        Route::get('mpesa-donations','PaymentsController@mpesaDonations');
    });
});