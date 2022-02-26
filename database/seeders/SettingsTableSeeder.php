<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Settings::truncate();

        Settings::create([
            'key' => 'overtime_method',
            'value' => 1,
            'expression' => '(salary / 173) * overtime_duration_total'
        ]);
    }
}
