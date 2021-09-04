<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{



    public function index()
    {
        // dd(Auth::check());
        if(Auth::check()){
            return view('backend.dashboard.index');
        }
        return view('auth.login');
        
    }
}
