<?php

Route::get('/', function () {
    return view('home.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::group(['middleware' => ['web']], function () {
    //
});
