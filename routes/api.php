<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/json', function (Request $request){
    return App\User::all();
  });


Route::group(['prefix' => 'v1'], function(){
    Route::post('/user/register', 'AuthController@store');
    Route::post('/user/signin', 'AuthController@signin');
});