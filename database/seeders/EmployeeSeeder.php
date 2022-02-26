<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employees;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Employees::create([
            'name' => 'Dicky Giancini',
            'status_id' => 3,
            'salary' => 5000000
        ]);
    }
}
