<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Overtimes;

class OvertimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Overtimes::create([
            'employee_id' => 1,
            'date' => '2022-02-21',
            'time_started' => '15:00',
            'time_ended' => '18:00'
        ]);
    }
}
