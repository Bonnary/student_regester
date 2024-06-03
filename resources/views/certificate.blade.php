@php
    use KhmerDateTime\KhmerDateTime;
    $khmerDateTime = KhmerDateTime::parse($student->date_of_birth);
    $datetime = DateTime::createFromFormat('Y-m-d', $student->date_of_birth);

    $subjectMap = [
        [
            'id' => 1,
            'subject_name' => 'ភាសាអង់គ្លេសសម្រាប់ទំនាក់ទំនង',
        ],
        [
            'id' => 2,
            'subject_name' => 'អប់រំភាសាអង់គ្លេស',
        ],
        [
            'id' => 3,
            'subject_name' => 'រៀបចំបណ្តាញកុំព្យួទ័រ',
        ],
        [
            'id' => 4,
            'subject_name' => 'សរសេកម្មវិធីគ្រប់គ្រងកុំព្យូទ័រ',
        ],
        [
            'id' => 5,
            'subject_name' => 'ច្បាប់',
        ],
        [
            'id' => 6,
            'subject_name' => 'រដ្ឋបាលសាធារណៈ',
        ],
        [
            'id' => 7,
            'subject_name' => 'ច្បាប់ការទូត',
        ],
        [
            'id' => 8,
            'subject_name' => 'ច្បាប់អង្គការអន្តរជាតិ',
        ],
        [
            'id' => 9,
            'subject_name' => 'ហិរញ្ញវត្ថុនិងធនាគារ',
        ],
        [
            'id' => 10,
            'subject_name' => 'សេដ្ឋកិច្ចអភិវឌ្ឍន៍',
        ],
        [
            'id' => 11,
            'subject_name' => 'វិនិយោគនិងផ្សារភាគហ៊ុន',
        ],
        [
            'id' => 12,
            'subject_name' => 'ទីផ្សារនិងទំនាក់ទំនង',
        ],
        [
            'id' => 13,
            'subject_name' => 'គ្រប់គ្រងនិងភាពជាអ្នកដឹកនាំ',
        ],
        [
            'id' => 14,
            'subject_name' => 'គណនេយ្យ និងសវនកម្ម',
        ],
        [
            'id' => 15,
            'subject_name' => 'គ្រប់គ្រងបដិសណ្ឋារកិច្ចនិងទេសចរណ៍',
        ],
        [
            'id' => 16,
            'subject_name' => 'គ្រប់គ្រងបដិសណ្ឋាគតកិច្ចអន្តរជាតិនិងព្រឹត្តិការណ៍ផ្សេងៗ',
        ],
        [
            'id' => 17,
            'subject_name' => 'គ្រប់គ្រងឧទ្យានការកំសាន្តនិងទេសចរណ៍',
        ],
        [
            'id' => 18,
            'subject_name' => 'គម្រោងប្លង់អគារទូទៅ និងប្លង់តុតែងលម្អ',
        ],
        [
            'id' => 19,
            'subject_name' => 'សំណង់ស្ពាន ថ្នល់ និងធារាសាស្រ្ត',
        ],
        [
            'id' => 20,
            'subject_name' => 'គម្រោងប្លង់ក្រុង និងប្លង់ទស្សនីយភាព',
        ],
        [
            'id' => 21,
            'subject_name' => 'ប្រព័ន្ធអគ្គិសនីក្នុងអគារ',
        ],
        [
            'id' => 22,
            'subject_name' => 'សំណង់អគារទូទៅ',
        ],
        [
            'id' => 23,
            'subject_name' => 'ប្រព័ន្ធអគ្គិសនីបញ្ជា',
        ],
        [
            'id' => 24,
            'subject_name' => 'ប្រព័ន្ធអគ្គិសនីខ្សែបញ្ជូន',
        ],
        [
            'id' => 25,
            'subject_name' => 'ប្រវត្តិវិទ្យា',
        ],
        [
            'id' => 26,
            'subject_name' => 'ទស្សនវិជ្ជា',
        ],
        [
            'id' => 27,
            'subject_name' => 'អក្សរសាស្ត្រខ្មែរ',
        ],
        [
            'id' => 28,
            'subject_name' => 'គណិតវិទ្យា',
        ],
        [
            'id' => 29,
            'subject_name' => 'គីមីវិទ្យា',
        ],
        [
            'id' => 30,
            'subject_name' => 'រូបវិទ្យា',
        ],
        [
            'id' => 31,
            'subject_name' => 'ជីវវិទ្យា',
        ],
        [
            'id' => 32,
            'subject_name' => 'គ្រប់គ្រងពាណិជ្ជកម្ម',
        ],
        [
            'id' => 33,
            'subject_name' => 'អក្សរសាស្រ្តអង់គ្លេស',
        ],
        [
            'id' => 34,
            'subject_name' => 'គ្រប់គ្រងហិរញ្ញវត្ថុ និងធនាគារ',
        ],
        [
            'id' => 35,
            'subject_name' => 'វិទ្យាសាស្ត្រកុំព្យូរទ័រ និងព័ត៌មានវិទ្យា',
        ],
        [
            'id' => 36,
            'subject_name' => 'គ្រប់គ្រងទេសចរណ៍ និងបដិសណ្ឋារកិច្ច',
        ],
    ];

    // map $subjectData->id to $subjectMap
    $subjectKhmer = collect($subjectMap)->firstWhere('id', $subjectData->id);

    $enrollmentTypeMap = [
        ['id' => 1, 'enrollment_type_name' => 'Bachelor'],
        ['id' => 2, 'enrollment_type_name' => 'Associate'],

        ['id' => 3, 'enrollment_type_name' => 'Master'],
        ['id' => 4, 'enrollment_type_name' => 'Doctor'],
    ];
    $enrollmentTypeEnglish = collect($enrollmentTypeMap)->firstWhere('id', $enrollment_typeData->id);

    $khmerSex = '';

    if ($student->sex === 'Male'){
        $khmerSex = 'ប្រុស';
    } else {
        $khmerSex = 'ស្រី';
    }

@endphp


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Hanuman:wght@100;300;400;700;900&display=swap');
        </style>

        <style>
            body {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Hanuman", serif;

            }

            .container {
                position: relative;
                width: 100%;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .certificate {
                width: 100%;
                height: 100%;
                object-fit: fill;

            }

            .khmer_name {
                position: absolute;
                top: 43%;
                left: 20%;

                font-weight: bold;
            }

            .khmer_gender {
                position: absolute;
                top: 46%;
                left: 20%;

                font-weight: bold;
            }

            .khmer_bir {
                position: absolute;
                top: 49%;
                left: 20%;

                font-weight: bold;
            }

            .khmer_cer {
                position: absolute;
                top: 55%;
                left: 20%;

                font-weight: bold;
            }

            .khmer_subj {
                position: absolute;
                top: 58%;
                left: 20%;

                font-weight: bold;
            }

            .english_name {
                position: absolute;
                top: 43%;
                right: 20%;

                font-weight: bold;
            }

            .english_gender {
                position: absolute;
                top: 46%;
                right: 20%;

                font-weight: bold;
            }

            .english_bir {
                position: absolute;
                top: 49%;
                right: 20%;

                font-weight: bold;
            }

            .english_cer {
                position: absolute;
                top: 55%;
                right: 20%;

                font-weight: bold;
            }

            .english_subj {
                position: absolute;
                top: 58%;
                right: 20%;

                font-weight: bold;
            }

            .profile {
                position: absolute;
                top: 71%;
                left: 47%;
                width: 125px;
                height: 100px;
            }
        </style>


        <title>Certificate</title>
    </head>

    <body>
        <div class="container">

            <img src={{ url('certificate.png') }} class="certificate" alt="">
            <p class="khmer_name">{{ $student->khmer_name }}</p>
            <p class="khmer_gender">{{$khmerSex}}</p>
            <p class="khmer_bir">{{ $khmerDateTime->format('LLLL') }}</p>
            <p class="khmer_cer">{{$enrollment_typeData->enrollment_type_name}}</p>
            <p class="khmer_subj">{{ $subjectKhmer['subject_name'] }}</p>

            <p class="english_name">{{ $student->english_name }}</p>
            <p class="english_gender">{{ $student->sex }}</p>
            <p class="english_bir">{{ $datetime->format('F j, Y') }}</p>
            <p class="english_cer">{{$enrollmentTypeEnglish['enrollment_type_name']}}'s Degree</p>
            <p class="english_subj">{{ $subjectData->subject_name }}</p>

            <img src={{ asset($student->image) }} class="profile" alt="">
        </div>

    </body>

</html>
