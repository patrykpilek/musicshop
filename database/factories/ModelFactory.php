<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Musicshop\User::class, function() {
    return [
        'username' => "admin",
        'email' => "admin@gmail.com",
        'password' => bcrypt("admin"),
        'first_name' => "admin",
        'last_name' => "admin",
        'address' => "",
        'avatar' => "",
        'is_admin' => true,
        'remember_token' => str_random(10),
    ];
});