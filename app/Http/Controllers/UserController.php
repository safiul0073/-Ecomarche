<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
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
         $imageUrl = '';
        $role = ['role_id' => $request->role, 'status' => 1];

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'

        ]);

        //.. $image = $request->file('image');
        $slug  = Str::slug($request->name);
        if($request->hasFile('image')){

            $imageUrl = imageUpload($slug,  $request->file('image'));
        }



         $user = User::create($request->all());

         $user->role_users()->create($role);
         if (!$imageUrl == '') {
            $user->image()->create(['url' => $imageUrl]);
         }
         return redirect()->route('user.index');

    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('Backend.user.create',compact('user', 'roles'));
    }

    public function update(Request $request,$id){
       // $role = ['role_id' => $request->role, 'status' => true];

        $user = User::find($id)->update($request->all());


      //  $user->role_users()->update();
        return redirect()->route('user.index');
    }
    public function destroy($id){
        User::find($id)->delete();
        Toastr::Success('User successfully deleted','Success');
        return redirect();
    }
}
