<?php
namespace App\View\Composer;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer {

    public function compose(View $view) {
        
        $view->with('categorys', Category::latest()->get());
    }
}