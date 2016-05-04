<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Musicshop\Album::truncate();

        factory(Musicshop\Album::class)->create([
            'id' => 1,
            'artist_id' => 1,
            'album_name' => "25",
            'description' => "Third studio album by the English singer/songwriter.",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 2,
            'artist_id' => 1,
            'album_name' => "19",
            'description' => "Critically-acclaimed debut album by the English singer-songwriter.",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 3,
            'artist_id' => 1,
            'album_name' => "21",
            'description' => "The follow-up to the English singer-songwriter's critically acclaimed debut '19'.",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 4,
            'artist_id' => 2,
            'album_name' => "If I Can Dream",
            'description' => "Collection of hits sung by Elvis Presley with the backing of the Royal Philharmonic Orchestra.",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 5,
            'artist_id' => 3,
            'album_name' => "Purpose",
            'description' => "Fourth studio album by the Canadian pop singer. Debuting at #2 in the UK Albums Chart,",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 6,
            'artist_id' => 3,
            'album_name' => "Believe",
            'description' => "Third studio album by the Canadian singer, which sees Bieber attempting ",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 7,
            'artist_id' => 4,
            'album_name' => "A Head Full of Dreams",
            'description' => "Very Good",
        ]);
    }
}
