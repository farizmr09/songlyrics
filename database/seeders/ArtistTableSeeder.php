<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Song;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Artist::truncate();
        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            $artistName = $faker->word;
            $artistIndex = strtoupper(substr($artistName, 0, 1));
            Artist::create([
                'artist_name' => $artistName,
                'artist_index' => $artistIndex
            ]);
        }
        //
    }
}
