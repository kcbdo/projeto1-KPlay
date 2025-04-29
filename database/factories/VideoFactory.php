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

        // $users = User::all();

        // $user = $users[rand(count($users))];

        // $user = User::where()->first()

        // dd($user->id);

        return [
            'title' => $this->faker->title(),
            'link' => "https://www.youtube.com/watch?v=H8tLS_NOWLs&list=RDxj_T9T9j_aE&index=10",
            'duration'=> $this->faker->time(),
            'description'=> $this->faker->text(500),
            'user_id' => $user->id
        ];
    }
}
