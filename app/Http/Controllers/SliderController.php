<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //
    public function index(){
        $sliders = Slider::all();
        return view('Backend.slider.index',compact('sliders'));
    }

    public function create(){
        return view('Backend.slider.create');
    }

    public function store(Request $request){
        $slider = ['title' => $request->title, 'status' => $request->status];
        Slider::create($request->all());

        return redirect()->route('slider.index');

    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('Backend.slider.create',compact('slider'));
    }

    public function update(Request $request, $id){
        $slider = ['title' => $request->title, 'status' => $request->status];
        Slider::find($id)->update($slider);
        return redirect()->route('slider.index');
    }

    public function destroy($id){

        Slider::find($id)->delete();
        return redirect()->route('slider.index');

    }
}
