<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function login()
    {
        //! check if user ready login
        if (!empty(Auth::check())) {
            if (Auth::user()->role == 'admin') {

                return redirect('admin/dashboard');
            } else {
                return redirect('staff/dashboard');
            }
        }
        return view('auth.login');
        // return view('admin.dashboard');
    }

    public function Authlogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        //! check if user provie email and passowrd
        //! the varable name is comfrom the html input 'name='
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

            if (Auth::user()->role == 'admin') {

                return redirect('admin/dashboard');
            } else {
                return redirect('staff/dashboard');
            }
        } else {
            //! if can't found user in the database return with an error
            //! the with function have 2 parameter ($return_section_name, $return_section_value)
            return redirect()->back()->with('error', 'Email or Passowr are incorrect');
            // dd($request->email, $request->password);

        }

        // dd($request);
    }

    function AuthLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
