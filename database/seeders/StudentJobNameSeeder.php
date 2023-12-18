<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentJobNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs =[
            'សិស្សទើបជាប់សញ្ញាបត្របឋមសិក្សាតុល្យភូមិ',
            'ប្រជាជនធម្មតាគ្មានការងារធ្វើ',
            'ពាណិជ្ជករ',
            'បុគ្គលិកអង្គការក្រៅរដ្ឋាភិបាល',
            'បុគ្គលិកក្រុមហ៊ុន',
            'បុគ្គលិកអង្គការក្រៅរដ្ឋាភិបាល',
            'កសិករ',
            'ផ្សេងៗ'
        ];

        foreach ($jobs as $sub) {
            DB::table('student_jobs')->insert([
                'student_job_name' => $sub
            ]);
        }
    }
}
