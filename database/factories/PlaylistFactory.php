<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Playlist;

class PlaylistFactory extends Factory
{
    
    protected $model = Playlist::class; 

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),     
            'is_public' => $this->faker->boolean(),   
        ];
    }
}
