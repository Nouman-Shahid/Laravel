<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
        
            account::create([

                "emp_id"=>fake()->numberBetween(1,9),
                "amount"=> fake()->numberBetween(40,70),
                "date"=>fake()->date(),

            ]);

        }
    }
}
