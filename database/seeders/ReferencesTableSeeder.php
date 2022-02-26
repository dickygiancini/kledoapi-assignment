<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References;

class ReferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // References::truncate();

        References::create([
            'code' => 'overtime_method',
            'name' => 'Salary / 173',
            'expression' => '(salary / 173) * overtime_duration_total',
        ]);

        References::create([
            'code' => 'overtime_method',
            'name' => 'Fixed',
            'expression' => '10000 * overtime_duration_total',
        ]);

        References::create([
            'code' => 'employee_status',
            'name' => 'Tetap',
            'expression' => null,
        ]);

        References::create([
            'code' => 'employee_status',
            'name' => 'Percobaan',
            'expression' => null,
        ]);
    }
}
