<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subject = [
            'English for Communication',
            'Teaching English',
            'Finance and Banking',
            'Development Economics',
            'Law',
            'Public Administration',
            'Diplomatic Law',
            'International Organization Law',
            'Finance and Banking',
            'Development Economics',
            'Investment and Stock Market',
            'Marketing and Communication',
            'Management and Leadership',
            'Accounting and Auditing',
            'Hospitality and Tourism Mannagement',
            'International Hospital and MICE Management',
            'Hospitality and Tourism Mannagement',
            'Achitechural and Interior Design',
            'Bridge, Road & Hydraulic Design & Contraction ',
            'Urban Planning and Lanscape Design',
            'Electrical Installation in Building ',
            'Building Design & Contraction',
            'Electrical control System',
            'Power Transmission and Distribution Line',
            'History',
            'Philosophy',
            'Khmer Literature',
            'Mathematics',
            'Chemistry',
            'Physics',
            'Biology',
            'Business Adminstration',
            'Arts in English',
            'Fanance and Banking',
            'Science and Information Technology',
            'Hospitality and Tourism Management'
        ];

        foreach ($subject as $sub) {
            DB::table('subjects')->insert([
                'subject_name' => $sub
            ]);
        }
    }
}
