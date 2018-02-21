<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/resetPass','UserController@resetPassReq');

Route::group(['middleware' => ['api','cors'], 'prefix' => 'v1'], function(){

    /**
     * Users Authentication
     *
     */
    Route::post('/student/login', 'AuthController@studentAuth');
    Route::post('/teacher/login', 'AuthController@teacherAuth');
    Route::post('/admin/login', 'AuthController@adminAuth');
	 Route::post('/user/signin','AuthController@signin');

    /**
     * Student CRUD
     *
     */
    Route::get('/users/{q}', 'UserController@index');
    Route::get('/users', 'UserController@index');
    Route::get('/user/{id}','UserController@profile');
    Route::get('/user', 'UserController@show');
    Route::post('/user', 'UserController@store');
    Route::patch('/user', 'UserController@update');
    // Gimana ya agar si avatarnya update nya jadi 1 sama fungsi update ?
    // Kenapa di gabungin sama si fungsi upload data bukanya dipisah fungsinya sama aja ?
    // Tentu beda, dengan memakai nama fungsi yang disarankan laravel kita bisa lebih simpel tanpa memanggil controller 1 per 1
    // dengan menggunakan function  Route::resource bisa menditeksi fungsi2 yang di butuhkan
    Route::post('/user/avatarUpload','UserController@update_avatar');
    Route::delete('/user/{id}', 'UserController@destroy');

    //    Route::post('/user/signup', 'AuthController@store');


    Route::group(['middleware' => ['jwt.auth','cors']], function(){

			Route::get('/dashboard','UserController@home')->name('dashboard');

			Route::post('/teacher','TeacherController@store');
			Route::get('/teacher','TeacherController@show');
			Route::get('/teachers','TeacherController@index');
			Route::get('/teacher','TeacherController@update');
			Route::delete('/teacher/{id}','TeacherController@destroy');
			Route::post('teacher/avatarUpload','TeacherController@update_avatar');
			Route::patch('/profile/teacher/edit/','TeacherController@update');

			Route::post('/project/create','ProjectController@store');
			Route::post('/project/{id}/member/add/','ProjectMemberController@store');
			Route::delete('/project/{id}/member/{member}/delete','ProjectMemberController@destroy');
			Route::post('/project/{id}/card/add','CardController@store');
			Route::delete('/project/{id}/card/{card}/delete','CardController@destroy');
			Route::post('/project/{id}/card/{card}/member/add/','CardMemberController@store');
			Route::delete('/project/{id}/card/{card}/member/{member}/delete','CardMemberController@destroy');
			// Route::post('/profile/edit/','TestAuthController@EditProfile');

			Route::post('/admin','AdminController@store');

			Route::get('/admin','AdminController@show');

			Route::patch('/admin','AdminController@update');
    });
});
