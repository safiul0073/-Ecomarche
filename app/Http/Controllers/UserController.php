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
        $image = $request->file('url');
        $slug  = Str::slug($request->name);
        if(isset($image)){
            $currentdate    = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentdate.'-'.uniqid().'.'.$image->getClientOriginalExtension();



            if(!Storage::disk('public')->exists('user_image')){
                Storage::disk('public')->makeDirectory('user_image');
            }
           Storage::disk('public')->put('user_image/',$imagename);
         // dd($imagename);
        }

        //  $user = [

        //      'name'     => $request->name,
        //      'email'    => $request->email,
        //      'phone'    => $request->phone,
        //      'address'  => $request->address,
        //      'password' => $request->password
        //  ];
       // $image_url = "sdfsdsdfdsf.png";
         $user = User::create($request->all());

         $roles = $user->role_users()->create($role);
         if ($imagename) {
            $user->image()->create(['url' => $imagename]);
         }

         return redirect()->route('user.index');

    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('Backend.user.edit',compact('user', 'roles'));
    }
}
