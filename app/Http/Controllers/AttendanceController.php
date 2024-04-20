<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\User;
use App\Models\StudentAttendanceModel;
use App\Exports\ExportAttendance;
use App\Models\ClassAndStudentsModel;
use App\Models\CollegesModel;
use App\Models\ExamModel;
use App\Models\SessionsModel;
use App\Models\StudentModel;
use App\Models\SubjectsModel;
use Maatwebsite\Excel\Facades\Excel as Exce;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function AttendanceStudent(Request $request)
    {

        // dd($request->all());
        $data['getClass'] = StudentClass::getClass();
        $data['getExam'] = ExamModel::getExam();
        $data['subject'] = SubjectsModel::getSubject();
        $data['college'] = CollegesModel::getCollege();
        $data['sessions'] = SessionsModel::getSession();
        $data['getStudent'] = [];
        if (
            !empty($request->get('class_id'))
            && !empty($request->get('subject_id'))
            && !empty($request->get('college_id'))
            && !empty($request->get('session_id'))
            && !empty($request->get('attendance_date'))
        ) {
            $data['getStudent'] = ClassAndStudentsModel::getStudents($request->get('class_id'), $request->get('subject_id'), $request->get('college_id'), $request->get('session_id'));

            // dd($data['getStudent']);
        }
        $data['header_title'] = "Student Attendance";

        return view('admin.attendance.student', $data);
    }
    public function AttendanceStudentSubmit(Request $request)
    {

        $check_attendance = StudentAttendanceModel::CheckAlreadyAttendance(
            $request->student_id,
            $request->class_id,
            $request->subject_id,
            $request->college_id,
            $request->session_id,
            $request->attendance_date
        );
        if (!empty($check_attendance)) {
            $attendance = $check_attendance;
        } else {
            $attendance = new StudentAttendanceModel;
            $attendance->student_id = $request->student_id;
            $attendance->class_id = $request->class_id;
            $attendance->subject_id = $request->subject_id;
            $attendance->college_id = $request->college_id;
            $attendance->session_id = $request->session_id;
            $attendance->attendance_date = $request->attendance_date;
            $attendance->created_by = Auth::user()->id;
        }
        $attendance->attendance_type = $request->attendance_type;
        $attendance->save();
        $json['message'] = "Attendance Successfully Saved";
        echo json_encode($json);
    }
    public function AttendanceReport(Request $request)
    {
        $data['getClass'] = StudentClass::getClass();
        $data['getExam'] = ExamModel::getExam();
        $data['subject'] = SubjectsModel::getSubject();
        $data['college'] = CollegesModel::getCollege();
        $data['sessions'] = SessionsModel::getSession();
        $data['getRecord'] = [];
        if (
            !empty($request->get('class_id'))
            && !empty($request->get('subject_id'))
            && !empty($request->get('college_id'))
            && !empty($request->get('session_id'))
            && !empty($request->get('attendance_date'))
        ) {
            $data['getRecord'] = StudentAttendanceModel::getRecord($request);
        }
        // dd($data['getRecord']);
        $data['header_title'] = "Attendance Report";
        return view('admin.attendance.report', $data);
    }
    public function AttendanceReportExportExcel(Request $request)
    {
        return Exce::download(new ExportAttendance($request), 'AttendanceReport_' . date('d-m-Y') . '.xls');
    }
}
