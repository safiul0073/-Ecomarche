<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\Image\ImageInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    protected $imageInterface;

    public function __construct(ImageInterface $imageInterface) {
        $this->imageInterface = $imageInterface;
    }
    
    public function index(Request $request)
    {
        $tab = $request->tab;
        
        return view('Backend.Product.index', compact('tab'));
    }

    public function create()
    {
        return view('Backend.Product.create');
    }


    public function store(Request $request)
    {



        $iamgeUrl = '';
        if ( $request->hasFile('images')) {
           
            $iamgeUrl = $this->imageInterface->uploadMultiImage($request->file('images'));
        }

       $product = Product::create($request->all());


        if ( $iamgeUrl != '') {
            $product->image()->create(['url' => $iamgeUrl]);
        }

        return redirect()->route('product.index');
    }


    public function show(Product $product)
    {
         Product::with('image','category','brand')->latest()->get();
        return view('Backend.Product.show',compact('product'));
    }


    public function edit(Product $product, Request $request)
    {
        $tab = $request->tab;
        return view('Backend.Product.create',compact('product', 'tab'));
    }


    public function update(Request $request, Product $product)
    {
        
    }


    public function destroy(Product $product)
    {
        if($product->image){
            $this->imageInterface->deleteMultiImage($product->image->url);
            $product->image->delete();
        }
        $product->delete();
        
        return redirect()->route('product.index');
    }
}
