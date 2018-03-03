<?php
Route::group(['middleware'=> ['web', 'cors']], function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/start', function () {
        return view('getstart');
    });
    Route::get('/login', function () {
        return view('welcome');
    });
    Route::get('/forgot', function () {
        return view('welcome');
    });
    Route::get('/board', function () {
        return view('student');
    });
    Route::get('board/p', function () {
        return view('project');
    });
    Route::get('/admin', function (){
        return view('admin');
    });
    Route::get('/teacher', function (){
        return view('teacher');
    });
    Route::get('/profile', function(){
        return view('welcome');
    });

	 Route::post('/resetPass','UserController@resetPassReq');
	 Route::get('/resetPass',function(){
		 return view('password');
	 });
});
