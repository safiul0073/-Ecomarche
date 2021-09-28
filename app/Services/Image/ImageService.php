<?php

namespace App\Services\Image;

use App\Models\Product;
use App\Models\User;
use File;

class ImageService implements ImageInterface
{
    protected $user;
    protected $product;
    public function __construct(User $user, Product $product) {
        $this->user = $user;
        $this->product = $product;
    }


    public function deleteSingleImage($url) {
       
            if(File::exists(public_path().$url)){
                File::delete(public_path().$url);
            }
            
        
    }
    public function deleteMultiImage($images) {
        foreach (explode(",", $images) as  $image) {
            $this->deleteSingleImage($image);
        }
    }
    public function uploadSingleImage($image) {
        $imagename = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
        $imagepublicpath = public_path('storage/image');
        $image->move($imagepublicpath, $imagename);
        $imagepath = '/storage/image/'.$imagename;
        
       return $imagepath;
    }
    
    public function uploadMultiImage($images) {

        $data = array();
        foreach ($images as  $image) {
            $data[] = $this->uploadSingleImage($image);
        }
        return implode(',', $data);
    }

}