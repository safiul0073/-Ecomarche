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
        $role = ['title' => $request->title];
         Role::create($role);
         $user = [

             'name'     => $request->name,
             'email'    => $request->email,
             'phone'    => $request->phone,
             'address'  => $request->address,
             'status'   => $request->status,
             'password' => $request->password
         ];
         User::create($user);
         return view('Backend.user.index');

    }
}
