<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\courses;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<10;$i++)
        {
            courses::create([
            'student_id'=>fake()->numberBetween(1,9),
            'courses'=>fake()->country(),
            'room'=>fake()->numberBetween(0,100),
            ]);
        }
    }
}
