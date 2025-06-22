<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
            Video::factory()->count(150)->create();    
    }
}
