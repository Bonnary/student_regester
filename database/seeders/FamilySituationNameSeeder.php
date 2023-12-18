<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilySituationNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $situation =[
            'កម្មករឬនិយោជិត',
            'កសិករ',
            'ពាណិជ្ជករ',
            'អ្នកលក់ដូរតូចតាច',
            'បុគ្គលិកក្រុមហ៊ុន',
            'បុគ្គលិកអង្គការក្រៅរដ្ឋាភិបាល',
            'បុគ្គលិកអង្គការអន្តរជាតិ',
            'កំព្រាឪពុក',
            'កំព្រាម្ដាយ',
            'កំព្រាឪពុកម្ដាយ',
            'ឪពុកឬម្ដាយជរា',
            'ផ្សេងៗ'
        ];

        foreach ($situation as $sub) {
            DB::table('family_situations')->insert([
                'family_situation_name' => $sub
            ]);
        }
    }
}
