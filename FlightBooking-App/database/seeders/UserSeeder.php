<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 10; $i++) {

            user::create([
                "name"=> fake()->name(),
                "phone"=> fake()->phoneNumber(),
                "email"=> fake()->email(),
                "city"=> fake()->city(),

            ]);
        }
    }
}
