<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Musicshop\Artist::truncate();

        factory(Musicshop\Artist::class)->create([
            'id' => 1,
            'artist_name' => "Adele",
        ]);

        factory(Musicshop\Artist::class)->create([
            'id' => 2,
            'artist_name' => "Elvis Presley",
        ]);

        factory(Musicshop\Artist::class)->create([
            'id' => 3,
            'artist_name' => "Justin Bieber",
        ]);

        factory(Musicshop\Artist::class)->create([
            'id' => 4,
            'artist_name' => "Coldplay",
        ]);
    }
}
