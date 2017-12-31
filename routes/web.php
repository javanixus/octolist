<?php
Route::group(['middleware'=> ['web', 'cors']], function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/login', function () {
        return view('welcome');
    });
    Route::get('/forgot', function () {
        return view('welcome');
    });
    Route::get('/admin', function (){
        return view('welcome');
    });
});