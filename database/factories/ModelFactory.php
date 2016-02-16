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
        'username' => "patrykpilek",
        'email' => "patryk.pilek@gmail.com",
        'password' => bcrypt("lukasz90"),
        'first_name' => "Patryk",
        'last_name' => "Pilek",
        'address' => "1 Tower Grove, LEEDS, LS12 3SF",
        'is_admin' => true,
        'remember_token' => str_random(10),
    ];
});