<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function list()
    {
        $data['header_title'] = 'Class List';
        $data['getRecord'] = User::getAccount();
        return view('admin.admin.list', $data);
    }

    function add()
    {
        $data['header_title'] = 'Add New Account';
        $data['roles'] = ['admin', 'staff'];
        return view('admin.admin.add', $data);
    }

    function insert(Request $request)
    {
        // ! add constraints to input
        request()->validate([
            // ? email mast be correct and unique
            'email' => 'required|email|unique:users'
        ]);
        $user = new User();
        // ! trim is for remove space from start and end of the input and alse \n and \t
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->role = trim($request->role);
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Create new account successfully.');
    }

    function edit($id)
    {

        $data['getRecord'] = User::getSingleAccount($id);
        $data['roles'] = ['admin', 'staff'];
        if (!empty($data['getRecord'])) {
            $data['header_title'] = 'Edit Account';
            return view('admin.admin.edit', $data);
        } else {
            abort(404);
        }
    }

    function update($id, Request $request)
    {
        // ! add constraints to input
       
        $user = User::getSingleAccount($id);
        // ! trim is for remove space from start and end of the input and alse \n and \t
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {

            $user->password = Hash::make($request->password);
        }
        $user->role = trim($request->role);
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Account update successfully.');
    }

    function delete($id)
    {
        $user = User::getSingleAccount($id);
        $user->is_delete = true;
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Account delete successfully.');

    }
}
