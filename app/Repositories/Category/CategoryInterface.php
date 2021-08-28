<?php

namespace App\Repositories;

use App\Models\Category;

interface CategoryInterface 
{
    public function getAll();
    // public function insert();
    public function getOneById(int $id);
    public function getByAny(string $text);
    public function update(Category $category);
    public function delete(Category $category);
}