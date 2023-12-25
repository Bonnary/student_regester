<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    function list()
    {
        $data['header_title'] = "Class List";
        $data['getRecord'] = StudentClass::getClass();
        return view('admin.class.list', $data);
    }

    function add()
    {
        $data['header_title'] = "Add New Class";
        $data['is_active'] = ['Active', 'InActive'];
        return view('admin.class.add', $data);
    }

    function insert(Request $request)
    {
        $class = new StudentClass;
        $class->room = $request->room;
        $class->is_active = $request->is_active === 'Active' ? true : false;
        $class->created_by
            = Auth::user()->id;
        $class->save();
        return redirect('admin/class/list')->with('success', 'Create new class successfully.');
    }

    function edit($id)
    {
        $data['getRecord'] = StudentClass::getSingleClass($id);
        $data['is_active'] = ['Active', 'InActive'];

        if (!empty($data['getRecord'])) {
            $data['header_title'] = 'Edit Class';
            return view('admin.class.edit', $data);
        } else {
            abort(404);
        }
    }

    function update($id, Request $request)
    {
        $class =
            StudentClass::getSingleClass($id);
        $class->room = $request->room;
        $class->is_active = $request->is_active == 'Active' ? true : false;
        $class->save();
        return redirect('admin/class/list')->with('success', 'Class update successfully.');
    }
    function delete($id)
    {
        $user = StudentClass::getSingleClass($id);
        $user->is_active = false;
        $user->save();
        return redirect('admin/class/list')->with('success', 'Class delete successfully.');
    }
}
