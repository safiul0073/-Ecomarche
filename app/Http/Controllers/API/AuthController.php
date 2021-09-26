<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function login (Request $request) {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = $request->user()->createToken("myToken")->plainTextToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'en-valied'], 404);
    }

    public function logout (Request $request) {
        dd(Auth::user());
        $request->user()->currentAccessToken()->delete();

        
        return response()->json(['success' => true], 200);
    }

    public function register (Request $request) {

        dd("hello");
    }
 }
