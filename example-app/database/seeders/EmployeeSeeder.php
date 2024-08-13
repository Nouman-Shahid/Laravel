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
        $employee = collect([
            [
            "id"=> 1,
            "name"=> "Numan",
            "email"=> "numan@gmail.com",
            "phone"=> "03214054589",
            "address"=> "Lahore",
            ],
            [
            "id"=> 2,
            "name"=> "Faraz",
            "email"=> "faraz@gmail.com",
            "phone"=> "0321329440",
            "address"=> "Islamabad",
            ],
            [
            "id"=> 3,
            "name"=> "Umer",
            "email"=> "umer@gmail.com",
            "phone"=> "03214787581",
            "address"=> "Sialkot",
            ],
        ]);

        $employee->each(function ($employee){
            employee::insert($employee);
       
    });
    }
}