<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryInterface;

class categoryRepository implements CategoryInterface
{
    protected $model;
    
    public function __construct(Category $category)
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

    public function update(Category $category) {

    }

    public function delete(Category $category) {

    }
}
