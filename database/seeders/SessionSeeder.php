<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $session = [
            'ព្រឹក',
            'រសៀល',
            'ល្ងាច',
            'ចុងសប្តាហ៍'
        ];

        foreach ($session as $sub) {
            DB::table('sessions')->insert([
                'session_name' => $sub
            ]);
        }
    }
}
