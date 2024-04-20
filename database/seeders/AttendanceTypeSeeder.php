<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $situation = [
            'Present',
            'Permission',
            'Absent',

        ];

        foreach ($situation as $sub) {
            DB::table('attendance_type')->insert([
                'name' => $sub
            ]);
        }
    }
}
