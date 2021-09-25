<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
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
        $users = User::with('image', 'role_users')->get();

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

            $imageUrl = imageUpload( $request->file('image'));
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

        $user = User::findOrFail($id);

        $slug  = Str::slug($request->name);


        $user->update($request->all());
        $user->role_users()->updateOrCreate(["user_id" => $id],["role_id" => $request->role]);

        return redirect()->route('user.index');
    }

    public function destroy($id){
        User::find($id)->delete();
        Toastr::Success('User successfully deleted','Success');
        return redirect()->back();
    }
}
