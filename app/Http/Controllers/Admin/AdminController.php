<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Session;
use Illuminate\Support\Str;

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

    public function RequstPass () {
        return view('auth.passwords.email');
    }
    public function PassEmail (Request $request) {

        $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
        // $user = User::where('email', $request->email)->first();
        // if ($user) {
        //     $code = rand(6); 
        //     Mail::send('Backend.Mail.reset', ['user'=> $user, 'code'=>$code], function ($message) use ($user) {
        //         $message->from("parsonal494@mail.com", "shop");
        //         $message->to($user->emial);
        //         $message->subject("Password Reset");
        //     });
        //     User::where('email',$request->email)->update([
        //         'reset_pass'=>$code
        //     ]);
        //     Session::flash('success', "Mailed to your mail for passwor Change with token");
        //     return back();
        // }
        // Session::flash('error', "Email not found!");
        // return back();
    }


    public function passwordUpdate(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('admin-panal')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

  public function index () {
        return view('auth.dashboardLogin');
    }


}
