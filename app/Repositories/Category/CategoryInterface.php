<?php

namespace App\Repositories\Category;

use App\Models\Category;

interface CategoryInterface 
{
    public function getAll();
    public function getOneById(int $id);
    public function getByAny(string $text);

}