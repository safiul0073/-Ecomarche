<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    protected $model;
    
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

   
     public function getAll() {
        return $this->model->all();
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
