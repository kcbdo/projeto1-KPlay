<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => "kathleen",
            'email' => "kathleencaroline357@gmail.com",
            'email_verified_at' => null,
            'password' => '1254'
        ]);
    }
}
