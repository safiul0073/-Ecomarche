<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Product\ProductInterface;

class ProductRepository implements ProductInterface
{
    protected $model;
    
    public function __construct(Product $category)
    {
        $this->model = $category;
    }

   
     public function getAll() {
        return $this->model->orderBy('id', 'desc')->get();
    } 

    public function getOneById(int $id) {

    }

    public function getByAny(string $text) {

    }



}
