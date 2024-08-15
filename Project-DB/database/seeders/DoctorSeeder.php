<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=10;$i++)
        {
            doctor::create([
                'name'=>fake()->name(),
                'phone'=>fake()->phoneNumber(),
                'email'=>fake()->email(),
                'age'=>fake()->numberBetween(38,55),
                'address'=>fake()->address(),
            ]);
        }
    }
}
