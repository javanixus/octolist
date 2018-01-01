<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['api','cors'], 'prefix' => 'v1'], function(){
    Route::post('/user/signin', 'AuthController@signin');
    Route::post('/user/signup', 'AuthController@store');
    Route::get('/user', 'UserController@index');
    Route::delete('user/{id}', 'UserController@destroy');
    Route::patch('user/{id}/update', 'UserController@update');

    Route::group(['middleware' => ['jwt.auth','cors']], function(){
			Route::get('/dashboard','UserController@home')->name('dashboard');
			Route::post('/profile/edit/','TestAuthController@EditProfile');
		});
});

Route::group(['middleware' => ['api'],'prefix' => 'testing'] , function(){
		Route::post('/signup','TestAuthController@signup');
});

