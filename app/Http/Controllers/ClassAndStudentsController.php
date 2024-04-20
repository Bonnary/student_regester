<?php

namespace App\Http\Controllers;

use App\Models\ClassAndStudentsModel;
use App\Models\CollegesModel;
use App\Models\SessionsModel;
use App\Models\StudentClass;
use App\Models\SubjectsAndCollegesModel;
use App\Models\SubjectsModel;
use Illuminate\Http\Request;

class ClassAndStudentsController extends Controller
{

    function list()
    {
        $data['header_title'] = "Student and Class";
        $data['getRecord'] = ClassAndStudentsModel::getClassAndStudents();


        return view('admin.student-class.list', $data);
    }

    function add()
    {
        $data['header_title'] = "Add Student to Class";
        $data['class'] = StudentClass::getClassRaw();
        $data['sessions'] = SessionsModel::getSession();
        $data['subject'] = SubjectsModel::getSubject();
        $data['college'] = CollegesModel::getCollege();
        // dd($data['class']);
        return view('admin.student-class.add', $data);
    }

    function insert(Request $request)
    {
        // $subject_and_college = new SubjectsAndCollegesModel();
        // $subject_and_college->subject_id = $request->subject_id;
        // $subject_and_college->college_id = $request->college_id;
        $subject_and_college_id = SubjectsAndCollegesModel::upsertDB($request->subject_id, $request->college_id);


        $class_and_students = new ClassAndStudentsModel();
        $class_and_students->class_id = $request->class_id;
        $class_and_students->student_id = $request->student_id;
        $class_and_students->session_id = $request->session_id;
        $class_and_students->generation = $request->generation;
        $class_and_students->subjects_and_colleges_id = $subject_and_college_id;
        $class_and_students->save();
        return redirect('admin/student-class/list')->with('message', 'Student added to class successfully');
    }
}
