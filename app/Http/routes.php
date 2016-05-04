<?php

Route::group(['middleware' => 'web', 'admin'], function () {
    Route::auth();

    Route::get('/', function () {
        return view('home.index');
    });

    Route::get('/home', 'HomeController@index');
    
    Route::get('/user', 'UserController@index');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::put('/user/edit/{id}', 'UserController@update');
    Route::post('/user/uploadAvatar/{id}', 'UserController@uploadUserAvatar');
    Route::get('/user/image/{filename}', 'UserController@getUserAvatar');
    Route::get('/user/address/{id}', 'UserController@getAddress');
    Route::put('/user/updateAddress/{id}', 'UserController@updateAddress');
    Route::get('/user/orders/{id}', 'UserController@getUserOrders');
    Route::get('/user/password/{id}', 'UserController@getPassword');
    Route::put('/user/updatePassword/{id}', 'UserController@updatePassword');

    Route::get('/admin', 'Admin\DashboardController@index');
    Route::resource('/admin/dashboard','Admin\DashboardController');
    Route::resource('/admin/users','Admin\UsersController', ['except' => 'show']);
    Route::resource('/admin/albums','Admin\AlbumsController');
});