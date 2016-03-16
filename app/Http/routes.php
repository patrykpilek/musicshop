<?php

Route::group(['middleware' => 'web', 'admin'], function () {
    Route::auth();

    Route::get('/', function () {
        return view('home.index');
    });

    Route::resource('/user', 'UserController');
    Route::get('/home', 'HomeController@index');

    Route::get('/admin', 'Admin\DashboardController@index');
    Route::resource('/admin/dashboard','Admin\DashboardController');
    Route::resource('/admin/users','Admin\UsersController', ['except' => 'show']);
    Route::resource('/admin/albums','Admin\AlbumsController');
});