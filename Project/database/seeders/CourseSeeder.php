<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Teacher;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all teacher IDs
        $teacherIds = Teacher::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            Course::create([
                "name" => fake()->city(),
                "credit hours" => fake()->numberBetween(1, 4), 
                "teacher_id" => $teacherIds->random(), // Assign a valid teacher_id
            ]);
        }
    }
}
