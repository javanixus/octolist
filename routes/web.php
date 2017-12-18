<?php

Route::group(['middleware'=> ['web']], function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/login', function () {
        return view('login');
    });
    Route::get('/forgot', function () {
        return view('forgotpass');
    });
    Route::get('/admin', function () {
        return view('admin');
    });
});