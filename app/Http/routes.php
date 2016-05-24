<?php

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/albumImage/{filename}', 'HomeController@getAlbumImage');
Route::get('/home/show/{id}', 'HomeController@show');
Route::get('/search', 'SearchAlbumController@getAlbumResults');
Route::get('/searchCD', 'SearchAlbumController@getCDResults');
Route::get('/searchVinyl', 'SearchAlbumController@getVinylResults');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@sendContactInfo');
Route::post('/basket', 'BasketController@basket');
Route::get('/basket', 'BasketController@basket');

Route::group(['middleware' => 'web', 'admin'], function () {
    Route::auth();

    Route::post('/basket', 'BasketController@basket');
    Route::get('/basket', 'BasketController@basket');
    Route::get('/order', 'OrderController@index');
    Route::get('/order/save', 'OrderController@saveOrder');

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('/home/albumImage/{filename}', 'HomeController@getAlbumImage');
    Route::get('/home/show/{id}', 'HomeController@show');
    Route::get('/search', 'SearchAlbumController@getAlbumResults');
    Route::get('/searchCD', 'SearchAlbumController@getCDResults');
    Route::get('/searchVinyl', 'SearchAlbumController@getVinylResults');
    Route::get('/contact', 'ContactController@index');
    Route::post('/contact', 'ContactController@sendContactInfo');

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
    Route::resource('/admin/users','Admin\UsersController');
    Route::resource('/admin/albums','Admin\AlbumsController');
    Route::post('/admin/albums/uploadImage/{id}', 'Admin\AlbumsController@uploadAlbumImage');
    Route::get('/admin/albums/image/{filename}', 'Admin\AlbumsController@getAlbumImage');
    Route::put('/admin/albums/description/{id}', 'Admin\AlbumsController@updateDescription');
});