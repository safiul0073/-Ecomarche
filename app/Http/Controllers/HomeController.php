<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{



    public function index()
    {
        return view('backend.dashboard.index');
    }

    
    public function editImage (Request $request) {
        echo "hello";
    }
}
