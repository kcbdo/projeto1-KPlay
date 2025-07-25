<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeeder::class,
            VideoSeeder::class,
        ]);

        User::factory()->count(100)->create();
        $this->call([
            CategorySeeder::class,
            PlaylistSeeder::class,
        ]);

    }
}
