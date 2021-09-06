<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'

        ]);



         $user = User::create($request->all());

         $roles = $user->role_users()->create($role);

         return redirect()->route('user.index');

    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('Backend.user.edit',compact('user', 'roles'));
    }
}
