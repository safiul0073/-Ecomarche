<?php
namespace App\View\Composer;

use App\Models\Product;
use Illuminate\View\View;

class ProductComposer {

    public function compose(View $view) {
        
        $view->with('products', Product::with('category', 'brand')->latest()->get());
    }
}