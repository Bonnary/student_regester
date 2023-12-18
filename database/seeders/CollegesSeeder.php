<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colleges = [
            'សិល្បៈមនុស្សសាសន៍និងភាសា',
            'វិទ្យាសាស្ត្រនិងបច្ចេកវិទ្យា',
            'នីតិសាស្ត្រ',
            'វិជ្ជាសាស្ត្រសង្គមនិងគ្រប់គ្រងសេដ្ឋកិច្ច',
            'គ្រប់គ្រងពាណិជ្ជកម្មនិងគណនេយ្យ',
            'គ្រប់គ្រងសណ្ឋាគារនិងទេសចរណ៍',
            'អនុបណ្ឌិត',
            'បណ្ឌិត'
        ];

        foreach ($colleges as $sub) {
            DB::table('colleges')->insert([
                'college_name' => $sub
            ]);
        }
    }
}
