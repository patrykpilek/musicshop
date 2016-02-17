<?php

Route::group(['middleware' => 'web', 'admin'], function () {
    Route::auth();

    Route::get('/', function () {
        return view('home.index');
    });

    Route::resource('user', 'UserController');
    Route::get('/home', 'HomeController@index');

    Route::get('/admin/dashboard', function(){
        return view('admin.overview.index');
    });

    Route::resource('/admin/users','Admin\UsersController', ['except' => 'show']);
});