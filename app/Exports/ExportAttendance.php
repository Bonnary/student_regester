<?php

namespace App\Exports;

use Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\StudentAttendanceModel;
use Illuminate\Http\Request;

class ExportAttendance implements FromCollection, WithMapping, WithHeadingRow
{

    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function heading(): array
    {
        return
            [
                "Student ID",
                "Student Name",
                "Class  Name",
                "Sunject Name",
                "College Name",
                "Session Name",
                "Attendance Type",
                "Attendance Date",
                "Created By",
                "Created Date",
            ];

        // return
        //     [
        //         "Student ID",
        //         "Student Name",
        //         "Class  Name",

        //     ];
    }
    public function map($value): array
    {
        $attendance_type = '';
        if ($value->attendance_type == 1) {
            $attendance_type = 'Present';
        } elseif ($value->attendance_type == 2) {
            $attendance_type = 'Permission';
        } elseif ($value->attendance_type == 3) {
            $attendance_type = 'Absent';
        }
        return
            [
                $value->student_id,
                $value->student_name,
                $value->class_name,
                $value->subject_name,
                $value->college_name,
                $value->session_name,
                $attendance_type,
                date('d-m-Y', strtotime($value->attendance_date)),
                $value->created_name,
                date('d-m-Y', strtotime($value->created_at))
            ];
    }
    public function collection()
    {
        return StudentAttendanceModel::getRecord($this->request);
    }
}
