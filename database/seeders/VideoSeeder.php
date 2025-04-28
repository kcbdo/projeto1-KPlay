<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('video')->insert([
            'ID' => Str::random(10),
            'Título' => Str::random(10).'@example.com',
            'Estilo' => Str::random(10),
            'Criado por' => Str::random(10),
            'Visualizações' => Str::random(10),

            
        ]);
    }
}
