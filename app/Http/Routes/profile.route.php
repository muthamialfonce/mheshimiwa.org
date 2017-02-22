<?php
/**
 * Academic level routes
 */

Route::group(['middleware'=>['web','auth']],function() {
    Route::group(['prefix'=>'education'], function(){
        Route::get('/','EducationLevelController@index');
        Route::post('/', 'EducationLevelController@store');
        Route::get('/delete/{educationlevel}', 'EducationLevelController@destroy');
    });

    Route::group(['prefix'=>'achievement'], function(){
        Route::get('/','AchievementController@index');
        Route::post('/', 'AchievementController@store');
        Route::get('/delete/{achievement}', 'AchievementController@destroy');
    });

    Route::group(['prefix'=>'experiences'], function(){
        Route::get('/','ExperienceController@index');
        Route::post('/', 'ExperienceController@store');
        Route::get('/delete/{experience}', 'ExperienceController@destroy');
    });

    Route::group(['prefix'=>'academic'], function(){
        Route::get('/','AcademicLevelController@index');
        Route::post('/', 'AcademicLevelController@store');
        Route::get('/delete/{academiclevel}', 'AcademicLevelController@destroy');
    });
     Route::group(['prefix'=>'post'], function(){
        Route::get('/','PostController@index');
        Route::post('/', 'PostController@store');
        Route::get('/delete/{post}', 'PostController@destroy');
    });
  Route::group(['prefix'=>'comment'], function(){
        Route::post('/', 'CommentController@store');
        Route::get('/delete/{comment}', 'CommentController@destroy');
    });
    Route::group(['prefix'=>'profile'], function(){
        Route::get('/view/{user}', 'ProfileController@viewProfile');
        Route::get('/approve/{user}', 'ProfileController@approve');
        Route::get('/disapprove/{user}', 'ProfileController@disapprove');
    });

    Route::group(['prefix'=>'myprofile'], function(){
        Route::get('/','ProfileEditController@index');
        Route::post('/', 'ProfileEditController@store');
    });

});
