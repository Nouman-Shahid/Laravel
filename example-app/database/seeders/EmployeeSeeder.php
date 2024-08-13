<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<20;$i++)
        {
            employee::create([
                'name'=>fake()->name(),
                'email'=>fake()->unique()->email(),   
                'phone'=>fake()->unique()->phoneNumber(),   
                'address'=>fake()->address(),   
            ]);
        }
    }
}