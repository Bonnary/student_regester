<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    function ForgotPassword()
    {
        return view('auth.forgot');
    }

    function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', 'Please check your email and reset your password');
        } else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }

    function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset', $data);
        } else {
            //? return http status code 404
            abort(404);
        }
    }

    function PostReset($token, Request $request)
    {
        if ($request->password == $request->cpassword) {
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('/')->with('success', 'Password successfully reset.');
        } else {
            return redirect()->back()->with('error', 'Password and Confirm password does not match');
        }
        // dd($request);
    }
}
