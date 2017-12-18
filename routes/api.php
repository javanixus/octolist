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

<<<<<<< HEAD
Route::get('/json', function (Request $request){
	// return $request;
	// return App\User::all();
    return App\User::where('email',$request->username);
  });
=======
Route::post('/login', 'UserController@login');

Route::group(['prefix' => 'v1'], function(){
    Route::post('/user/register', 'AuthController@store');
    Route::post('/user/signin', 'AuthController@signin');
});
>>>>>>> aa2a205cac5ed1b38579231e5664118b6810109d
