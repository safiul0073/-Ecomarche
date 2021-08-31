<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        $stores = Store::all();
        return view('Backend.store.index',compact('stores'));
    }

    public function create(){
        return view('Backend.store.create');
    }

    public function store(Request $request){

        $store = [
            'name'      => $request->name,
            'phone'     => $request->phone,
            'city'      => $request->city,
            'desc'      => $request->desc,
            'status'    => $request->status

        ];
        Store::create($store);
        return redirect()->route('store.index');

    }

    public function edit($id){
        $store = Store::find($id);
        return view('Backend.store.create',compact('store'));
    }

    public function update(Request $request,$id){
        $store = [
            'name'      => $request->name,
            'phone'     => $request->phone,
            'city'      => $request->city,
            'desc'      => $request->desc,
            'status'    => $request->status
        ];
        Store::find($id)->update($store);
        return redirect()->route('store.index');
    }

    public function destroy($id){

        Store::find($id)->delete();
        return redirect()->back();
    }

}
