<?php

Route::group(['middleware'=> ['web', 'cors']], function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/login', function () {
        return view('login');
    });
    Route::get('/forgot', function () {
        return view('forgotpass');
    });
    Route::get('/admin', 'PagesController@admin');
});