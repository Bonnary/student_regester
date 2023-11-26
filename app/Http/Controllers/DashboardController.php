<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role == 'admin') {

            return view('admin.dashboard');
        } else {
            return view('staff.dashboard');

        }
    }
}