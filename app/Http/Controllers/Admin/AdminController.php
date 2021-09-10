<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function login(Request $request)
    {

        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credentials)) {
            
            return redirect()->route('dashboard');
        }
        return back();
    }

  public function logout() {
        Auth::logout();
        return view('auth.dashboardLogin');
    }

  public function index () {
        return view('auth.dashboardLogin');
    }


}
