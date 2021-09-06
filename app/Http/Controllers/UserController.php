<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $roles = Role::all();
        $users = User::all();
        return view('Backend.user.index',compact('users','roles'));
    }

    public function create(){
        $roles = Role::all();
        return view('Backend.user.create',compact('roles'));
    }

    public function store(Request $request){
        $role = ['role_id' => $request->role, 'status' => 1];

         $user = [

             'name'     => $request->name,
             'email'    => $request->email,
             'phone'    => $request->phone,
             'address'  => $request->address,
             'password' => $request->password
         ];
         $image_url = "sdfsdsdfdsf.png";
         $user = User::create($user);

         $roles = $user->role_users()->create($role);
         if ($image_url) {
            $user->image()->create(['url' => $image_url]);
         }
         
         return redirect()->route('user.index');

    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('Backend.user.edit',compact('user', 'roles'));
    }
}
