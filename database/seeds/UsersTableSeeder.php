<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Musicshop\User::truncate();

        factory(Musicshop\User::class)->create();
    }
}
