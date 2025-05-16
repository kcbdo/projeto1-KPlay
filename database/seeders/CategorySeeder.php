<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=
        [
            'Educação',
            'Entretenimento',
            'Tecnologia',
            'Música',
            'Esportes',
            'Notícias',
            'Ciência',
            'Jogos',
            'Filmes',
            'Documentários'
        ];
        
        foreach ($categories as $name)
        {
            Category::create(['name'=> $name]);
        }
    }
}
