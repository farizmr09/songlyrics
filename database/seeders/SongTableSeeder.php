<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;
use App\Models\Album;

class SongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Song::truncate();
        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 100; $i++) {

            //randomize artist id for this song
            $artistId = random_int(1, 10);

            // find Album of this artist from Album model
            $albums = Album::where('artist_id', $artistId)->get();
            //if not empty, randomize albums for this Song
            $album = null;
            if ($albums->isNotEmpty()) {
                // randomize 
                $album = random_int(1, 10) < 8 ? $albums->random() : new Album();
            }

            Song::create([
                'title' => $faker->words(5, true),
                'lyric' => $faker->paragraph,
                'artist_id' => $artistId,
                'album_id' => $album->id
            ]);
        }
        //
    }
}
