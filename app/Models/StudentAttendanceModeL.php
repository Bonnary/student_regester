<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StudentAttendanceModeL extends Model
{
    use HasFactory;
    protected $table = 'student_attendance';
    static public function CheckAlreadyAttendance($student_id = 0, $class_id = 0, $subject_id = 0, $college_id = 0, $session_id = 0, $attendance_date = 0)
    {

        return StudentAttendanceModeL::where('student_id', '=', $student_id)->where('class_id', '=', $class_id)
            ->where('subject_id', '=', $subject_id)->where('college_id', '=', $college_id)
            ->where('session_id', '=', $session_id)->where('attendance_date', '=', $attendance_date)->first();
    }
    static public function getRecord(Request $request)
    {
        $return = StudentAttendanceModeL::select(
            'student_attendance.*',
            'class.room as class_name',
            'subjects.subject_name as subject_name',
            'colleges.college_name as college_name',
            'sessions.session_name as session_name',
            'student.english_name as student_name',
            'createdby.name as created_name'
        )
            ->join('class', 'class.id', '=', 'student_attendance.class_id')
            ->join('subjects', 'subjects.id', '=', 'student_attendance.subject_id')
            ->join('colleges', 'colleges.id', '=', 'student_attendance.college_id')
            ->join('sessions', 'sessions.id', '=', 'student_attendance.session_id')
            ->join('students as student', 'student.id', '=', 'student_attendance.student_id')
            ->join('users as createdby', 'createdby.id', '=', 'student_attendance.created_by');
        //Fliter StudentID
        if (!empty($request->student_id)) {
            $return = $return->where('student_attendance.student_id', '=', $request->student_id);
        }

        //Fliter Student lastName
        if (!empty($request->student_name)) {
            $return = $return->where('student.english_name', 'like', '%' . $request->student_name . '%');
        }
        //Fliter class
        if (!empty($request->class_id)) {
            $return = $return->where('student_attendance.class_id', '=', $request->class_id);
        }

        //Fliter subject
        if (!empty($request->sunject_id)) {
            $return = $return->where('student_attendance.subject_id', '=', $request->sunject_id);
        }
        //Fliter college
        if (!empty($request->college_id)) {
            $return = $return->where('student_attendance.college_id', '=', $request->college_id);
        }
        //Fliter session
        if (!empty($request->session_id)) {
            $return = $return->where('student_attendance.session_id', '=', $request->session_id);
        }
        //Fliter date
        if (!empty($request->attendance_date)) {
            $return = $return->where('student_attendance.attendance_date', '=', $request->attendance_date);
        }
        //Fliter Attendance type
        if (!empty($request->attendance_type)) {
            $return = $return->where('student_attendance.attendance_type', '=', $request->attendance_type);
        }
        $return = $return->orderBy('student_attendance.id', 'desc')->paginate(20);

        return $return;
    }

    static public function getRecordAll()
    {
        $return = StudentAttendanceModeL::select(
            'student_attendance.*',
            'class.room as class_name',
            'subjects.subject_name as subject_name',
            'colleges.college_name as college_name',
            'sessions.session_name as session_name',
            'student.english_name as student_name',
            'createdby.name as created_name'
        )
            ->join('class', 'class.id', '=', 'student_attendance.class_id')
            ->join('subjects', 'subjects.id', '=', 'student_attendance.subject_id')
            ->join('colleges', 'colleges.id', '=', 'student_attendance.college_id')
            ->join('sessions', 'sessions.id', '=', 'student_attendance.session_id')
            ->join('students as student', 'student.id', '=', 'student_attendance.student_id')
            ->join('users as createdby', 'createdby.id', '=', 'student_attendance.created_by');

        $return = $return->orderBy('student_attendance.id', 'desc')->paginate(50);

        return $return;
    }
}
