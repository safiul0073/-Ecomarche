<?php

namespace App\Repositories\Product;

use App\Models\Product;

interface ProductInterface 
{
    public function getAll();
    public function getOneById(int $id);
    public function getByAny(string $text);

}