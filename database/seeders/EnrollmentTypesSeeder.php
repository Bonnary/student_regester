<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enrollment_types = [
            'បរិញ្ញាបត្រ',
            'បរិញ្ញាបត្ររង',
            'អនុបណ្ឌិត',
            'បណ្ឌិត'
        ];

        foreach ($enrollment_types as $sub) {
            DB::table('enrollment_types')->insert([
                'enrollment_type_name' => $sub
            ]);
        }
    }
}
