<?php

use Illuminate\Database\Seeder;

class TracksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Musicshop\Track::truncate();

        factory(Musicshop\Track::class, 15)->create([
            'artist_id' => 1,
            'album_id' => 1,
        ]);

        factory(Musicshop\Track::class, 17)->create([
            'artist_id' => 1,
            'album_id' => 2,
        ]);

        factory(Musicshop\Track::class, 12)->create([
            'artist_id' => 1,
            'album_id' => 3,
        ]);

        factory(Musicshop\Track::class, 13)->create([
            'artist_id' => 2,
            'album_id' => 4,
        ]);

        factory(Musicshop\Track::class, 18)->create([
            'artist_id' => 3,
            'album_id' => 5,
        ]);

        factory(Musicshop\Track::class, 12)->create([
            'artist_id' => 3,
            'album_id' => 6,
        ]);

        factory(Musicshop\Track::class, 20)->create([
            'artist_id' => 4,
            'album_id' => 7,
        ]);
    }
}
