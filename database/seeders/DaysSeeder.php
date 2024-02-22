<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enrollment_types = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Wednesday',
            'Saturday',
            'Sunday'
        ];

        foreach ($enrollment_types as $sub) {
            DB::table('days')->insert([
                'day_name' => $sub
            ]);
        }
    }
}
