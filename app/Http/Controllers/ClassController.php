<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    function list() {
        $data['header_title'] = "Class List";
        return view('admin.class.list',$data);
    }

    function add() {
        $data['header_title'] = "Add New Class";
        return view('admin.class.add', $data);
    }
}
