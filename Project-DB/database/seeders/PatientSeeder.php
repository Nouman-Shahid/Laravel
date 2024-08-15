<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=10;$i++)
        {
            patient::create([
                'doc_id'=>fake()->numberBetween(1,10),
                'name'=>fake()->name(),
                'phone'=>fake()->phoneNumber(),
                'email'=>fake()->email(),
                'address'=>fake()->address(),


            ]);
        }
        
    }
}
