<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function list()
    {
        $data['header_title'] = "Student List";
        // $data['getRecord'] = StudentClass::getClass();
        return view('admin.student.list', $data);
    }
}
