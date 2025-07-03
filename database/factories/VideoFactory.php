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
            'duration' => $this->faker->time(),
            'description' => $this->faker->text(250),
            'user_id' => $user->id,
            'thumbnail' => null,
            // 'thumbnail' => $this->faker->imageUrl(640, 480, 'video', true, 'Faker'),
            // 'video' => $this->faker->file('public/videos', 'public/videos', false),
        ];
    }
}