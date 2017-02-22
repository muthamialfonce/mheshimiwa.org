<?php
Route::group(['middleware'=>['web']],function() {

    Route::group(['prefix' => 'donations'], function () {
        Route::post("to/{user}", "DonationsController@prepare");
        Route::get("charge/{user}", "DonationsController@charge");
        Route::get("paypal_success/{user}/{txn_id}", "DonationsController@paypalSuccess");
        Route::get("donate_mpesa/{user}/{subscriber}", "DonationsController@mpesaDonation");
        Route::post("donate_mpesa/{user}/{subscriber}", "DonationsController@lookupMpesa");
        Route::get("mpesa_success/{mpesa_donation}", "DonationsController@mpesaSuccess");
    });
});
    Route::group(['middleware'=>['web','auth']],function(){
    Route::group(['prefix'=>'my_donations'],function(){
       Route::get("","DonationsController@myDonations");
       Route::post("withdraw","DonationsController@requestWithdrawal");
    });
});