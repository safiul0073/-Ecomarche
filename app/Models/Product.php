<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'category_id',
        'brand_id',
        'title',
        'metatitle',
        'slug',
        'summary',
        'type',
        'sku',
        'price',
        'discount',
        'quantity',
        'content',
        'status'
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }



    public function category(){
        return $this->belongsTo(Category::class,);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}


