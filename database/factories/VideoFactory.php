<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        return [
            'title' => $this->faker->title(),
            'link' => 'videos/projeto.mp4', 
            'duration' => $this->faker->time(),
            'description' => $this->faker->text(250),
            'user_id' => $user->id,
            'thumbnail' => null,
        ];
    }
}