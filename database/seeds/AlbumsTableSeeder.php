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
            'description' => "Third studio album by the English singer/songwriter. Debuting at #1 in the UK Albums, the album features the singles 'Hello' and 'When We Were Young'.",
            'price' => 9.99,
            'format' => "CD",
            'category' => "Rock",
            'image'=> "",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 2,
            'artist_id' => 1,
            'album_name' => "19",
            'description' => "Critically-acclaimed debut album by the English singer-songwriter. Recorded while the singer was 19 years old, the album features the singles 'Hometown Glory', 'Chasing Pavements', 'Cold Shoulder', 'Tired' and 'Make You Feel My Love' (Bob Dylan cover).",
            'price' => 7.99,
            'format' => "CD",
            'category' => "Jazz",
            'image'=> "",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 3,
            'artist_id' => 1,
            'album_name' => "21",
            'description' => "The follow-up to the English singer-songwriter's critically acclaimed debut '19'. Produced by, amongst others, Rick Rubin and Paul Epworth, the record went platinum after just four days and includes the hit singles 'Rolling in the Deep', 'Someone Like You' and 'Set Fire to the Rain'.",
            'price' => 9.99,
            'format' => "CD",
            'category' => "Blues",
            'image'=> "",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 4,
            'artist_id' => 2,
            'album_name' => "If I Can Dream",
            'description' => "Collection of hits sung by Elvis Presley with the backing of the Royal Philharmonic Orchestra. Debuting at #1 in the UK Albums Chart, this posthumous album also features the collaborative effort of 'Fever' with Michael Bublé.",
            'price' => 9.99,
            'format' => "CD",
            'category' => "Rock",
            'image'=> "",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 5,
            'artist_id' => 3,
            'album_name' => "Purpose",
            'description' => "Fourth studio album by the Canadian pop singer. Debuting at #2 in the UK Albums Chart, the album features the singles 'What Do You Mean?', 'Sorry' and 'Love Yourself'.",
            'price' => 9.99,
            'format' => "CD",
            'category' => "Rock",
            'image'=> "",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 6,
            'artist_id' => 3,
            'album_name' => "Believe",
            'description' => "Third studio album by the Canadian singer, which sees Bieber attempting to make a departure from the teen pop sound of his earlier records in favour of a more mature sound. Singles include 'Boyfriend', 'As Long As You Love Me' and 'Beauty and a Beat' and the album entered the UK Albums Chart at #1.",
            'price' => 3.99,
            'format' => "CD",
            'category' => "Rock",
            'image'=> "",
        ]);

        factory(Musicshop\Album::class)->create([
            'id' => 7,
            'artist_id' => 4,
            'album_name' => "A Head Full of Dreams",
            'description' => "Sixth studio album by the British alternative rock band. The concept album features the singles 'Magic', 'Midnight' and 'A Sky Full of Stars' and is said to be inspired by lead singer Chris Martin's relationship with actress Gwyneth Paltrow. The album debuted at #1 in the UK Albums Chart.",
            'price' => 9.99,
            'format' => "CD",
            'category' => "Rock",
            'image'=> "",
        ]);
    }
}
