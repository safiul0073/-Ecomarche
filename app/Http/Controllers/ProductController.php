<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
         $products   = Product::all();
        return view('Backend.Product.index',compact('products'));
    }

    public function create(){
        return view('Backend.Product.create');
    }

    public function store(Request $request){
        // return $request->all();
        // $product    = [
        //     'title'     => $request->title,
        //     'summary'   => $request->summary,
        //     'sku'       => $request->sku,
        //     'price'     => $request->price,
        //     'discount'  => $request->discount,
        //     'quantity'  => $request->quantity,
        //     'content'   => $request->content,
        //     'status'    => $request->status
        // ];
        Product::create($request->all());
        Toastr::Success('Product create successfully','Success');
        return redirect()->route('product.index');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('Backend.Product.create',compact('product'));
    }

    public function update(Request $request,$id){
        $products    = [
            'title'     => $request->title,
            'summary'   => $request->summary,
            'sku'       => $request->sku,
            'price'     => $request->price,
            'discount'  => $request->discount,
            'quantity'  => $request->quantity,
            'content'   => $request->content,
            'status'    => $request->status
        ];
        Product::find($id)->update($products);
        Toastr::Success('Product Updated successfully','Success');
        return redirect()->route('product.index');
    }

    public function destroy($id){
        // return $id;
        Product::find($id)->delete();
        Toastr::Success('Deleted Successfully','Success');
        return redirect()->back();
    }
}
