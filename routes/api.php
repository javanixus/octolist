<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['api','cors'], 'prefix' => 'v1'], function(){
    Route::post('/user/signin', 'AuthController@signin');
    Route::post('/user/signup', 'AuthController@store');
    Route::post('/user', 'UserController@store');
    Route::get('/users', 'UserController@index');
    Route::patch('/user/{id}', 'UserController@update');
    Route::delete('/user/{id}', 'UserController@destroy');

    Route::group(['middleware' => ['jwt.auth','cors']], function(){
			Route::get('/dashboard','UserController@home')->name('dashboard');
			// Route::post('/profile/edit/','TestAuthController@EditProfile');
			Route::patch('/profile/teacher/edit/','TeacherController@update');
    });
});
