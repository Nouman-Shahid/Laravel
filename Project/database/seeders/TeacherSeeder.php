<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {

           teacher::create([
             'name'=>fake()->name(),
             'email'=> fake()->email(),
             'phone'=> fake()->phoneNumber(),
             'city'=>fake()->city(),
           ]);

        }
    }
}
