<?php

namespace App\Http\Controllers;

use App\Models\ClassAndStudentsModel;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class ClassAndStudentsController extends Controller
{

    function list() {
        $data['header_title'] = "Student and Class";
        $data['getRecord'] = ClassAndStudentsModel::getClassAndStudents();
        return view('admin.student-class.list', $data);
    }

    function add() {
        $data['header_title'] = "Add Student to Class";
        $data['class'] = StudentClass::getClassRaw();
        // dd($data['class']);
        return view('admin.student-class.add', $data);
    }

    function insert(Request $request) {
        $class_and_students = new ClassAndStudentsModel();
        $class_and_students->class_room = $request->class_room;
        $class_and_students->student_id = $request->student_id;
        $class_and_students->save();
        return redirect('admin/student-class/list')->with('message', 'Student added to class successfully');
    }
}
