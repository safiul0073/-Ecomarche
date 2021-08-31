<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('Backend.role.index',compact('roles'));
    }

    public function create(){
        return view('Backend.role.create');
    }

    public function store(Request $request){
        $role = [ 'title' => $request->title, 'status' => $request->status];
        Role::create($role);
        return redirect()->route('role.index');
    }
    public function edit($id){
        $role = Role::find($id);
        return view('Backend.role.create',compact('role'));
    }

    public function update(Request $request,$id){
        $role = [ 'title' => $request->title, 'status' => $request->status];
        Role::find($id)->update($role);
        return redirect()->route('role.index');
    }

    public function destroy($id){
        Role::find($id)->delete();
        Toastr::success('Role Deleted Successfully','Success');
        return redirect()->back();
    }
}
