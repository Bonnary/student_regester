<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grade = [
            'A+',
            'A',
            'A-',
            'B+',
            'B',
            'C+',
            'C-',
            'C',
            'E+',
            'E-',
            'E',
            'F'
        ];
        foreach ($grade as $sub) {
            DB::table('grades')->insert([
                'grade_name' => $sub
            ]);
        }
    }
}
