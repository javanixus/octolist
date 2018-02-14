<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'UserController@login');

Route::post('/resetPass','UserController@resetPassReq');

Route::group(['middleware' => ['api','cors'], 'prefix' => 'v1'], function(){

    Route::get('/users', 'UserController@index');

    Route::get('/user/{id}', 'UserController@show');

    Route::post('/user/signin', 'AuthController@signin');

    Route::post('/user/signup', 'AuthController@store');

		Route::post('/user', 'UserController@store');

//    Route::get('/users/{q}', 'UserController@index');

    Route::patch('/user/{id}', 'UserController@update');

	 Route::post('/user/avatarUpload','UserController@update_avatar');

    Route::delete('/user/{id}', 'UserController@destroy');


    Route::group(['middleware' => ['jwt.auth','cors']], function(){

			Route::get('/dashboard','UserController@home')->name('dashboard');

			Route::post('teacher/signup','TeacherController@store');

			Route::post('/project/create','ProjectController@store');

			Route::patch('/profile/teacher/edit/','TeacherController@update');

			Route::post('/project/{id}/member/add/','ProjectMemberController@store');

			Route::delete('/project/{id}/member/{member}/delete','ProjectMemberController@destroy');

			Route::post('/project/{id}/card/add','CardController@store');

			Route::delete('/project/{id}/card/{card}/delete','CardController@destroy');

			Route::post('/project/{id}/card/{card}/member/add/','CardMemberController@store');

			Route::delete('/project/{id}/card/{card}/member/{member}/delete','CardMemberController@destroy');
			// Route::post('/profile/edit/','TestAuthController@EditProfile');

    });
});
