<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['api','cors'], 'prefix' => 'v1'], function(){
<<<<<<< HEAD
    Route::post('/user/signup', 'AuthController@store');
    Route::post('/user/signin', 'AuthController@signin');
		Route::group(['middleware' => ['jwt.auth','cors']], function(){
			Route::get('/dashboard','UserController@home')->name('dashboard');
			// Route::post('/profile/edit/','TestAuthController@EditProfile');
			Route::patch('/profile/teacher/edit/','TeacherController@update');
			Route::post('/teacher/signup','TeacherController@store');
		});
});

Route::group(['middleware' => ['api'],'prefix' => 'testing'] , function(){
		Route::post('/signup','TestAuthController@signup');
=======
    Route::post('/user/signin', 'AuthController@signin');
//    Route::post('/user/signup', 'AuthController@store');
    Route::post('/user', 'UserController@store');
    Route::get('/user', 'UserController@index');
    Route::patch('/user/{id}', 'UserController@update');
    Route::delete('/user/{id}', 'UserController@destroy');

    Route::group(['middleware' => ['jwt.auth','cors']], function(){
			Route::get('/dashboard','UserController@home')->name('dashboard');
			// Route::post('/profile/edit/','TestAuthController@EditProfile');
			Route::patch('/profile/teacher/edit/','TeacherController@update');
    });
>>>>>>> 151ea3b3a925264147e60c947b718bcb92dc3ae6
});
