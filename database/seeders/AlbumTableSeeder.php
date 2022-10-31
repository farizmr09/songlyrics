<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Album::truncate();
        $faker = \Faker\Factory::create('en');

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 30; $i++) {
            Album::create([
                'title' => $faker->text,
                'release_date' => $faker->date,
                'artist_id' => random_int(1, 10)
            ]);
        }
        //
        //
    }
}
