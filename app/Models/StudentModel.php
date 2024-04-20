<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class StudentModel extends Model
{
    use HasFactory;
    protected $table = 'students';

    static function getStudent()
    {
        $return = self::where('is_active', true);

        if (!empty(Request::get('student_id'))) {
            $return = $return->where('student_id', '=', Request::get('student_id'));
        }

        if (!empty(Request::get('english_name'))) {
            $return = $return->where('english_name', 'like', '%' . Request::get('english_name') . '%');
        }

        if (!empty(Request::get('generation'))) {
            $return = $return->where('generation', '=', Request::get('generation'));
        }

        $return = $return->orderBy('id', 'desc')->paginate(20);
        return $return;
    }

    public static function getHighestID()
    {
        // Assuming 'id' is the primary key and auto-incrementing
        $lastRecord = self::orderBy('id', 'desc')->first();
        return $lastRecord ? $lastRecord->id : 0;
    }

    static function getSingleStudent($id)
    {
        $return = self::where('id', $id)->first();
        return $return;
    }

    static function getStudentClass($class_id)
    {
        $class_with_student = ClassAndStudentsModel::getSingle($class_id);
        $students = [];
        if (!empty($class_with_student)) {
            array_push($students, self::getSingleStudent($class_with_student->student_id));
            return $students;
        } else {
            return [];
        }

    }

    static function getStudentByClassID($class_id)
    {
        return self::select('students.*')
        ->where('students.is_active', '=', 0)
            ->where('students.subjects_and_colleges_id', '=', $class_id)
            ->orderBy('students.id', 'desc')
            ->get();
    }

    //Create function
    static public function getAttendance($student_id, $class_id, $attendance_date)
    {
        return StudentAttendanceModel::CheckAlreadyAttendance($student_id, $class_id, $attendance_date);
    }
}
