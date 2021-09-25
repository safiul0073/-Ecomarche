<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category', 'brand')->get();
 
        return view('Backend.Product.index', compact('products'));
    }

    public function create()
    {
        $categorys = Category::all();
        $brands = Brand::all();
        return view('Backend.Product.create', compact('categorys', 'brands'));
    }


    public function store(Request $request)
    {
       
        $iamgeUrl = '';
        if ( $request->hasFile('images')) {
            $urls = [];
            $images = $request->file('images');
            foreach ($images as $image) {
                $urls[] = imageUpload($image);
            }

            $iamgeUrl = implode(',', $urls);  
        }

       $product = Product::create($request->all());

        if ( $iamgeUrl != '') {
            $product->image()->create(['url' => $iamgeUrl]);
        }

        return redirect()->route('product.index');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
