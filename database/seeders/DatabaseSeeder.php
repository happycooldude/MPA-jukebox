<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Album;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genre::factory(5)->create();
        Artist::factory(5)->create();
        Song::factory(5)->create();
    }
}
