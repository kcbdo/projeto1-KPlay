<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::insert([
            'title'=> Str::random(100),
            'link'=> Str::random(100),
            'duration' => rand(1, 300),
            'description' => Str::random(500),
            'user_id'=> User::inRandomOrder()->first()->id,
            

        ]);
    }
}
