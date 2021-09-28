<?php

namespace App\Services\Image;


interface ImageInterface  
{
   

    public function deleteSingleImage($iamge);
    public function deleteMultiImage($images);
    public function uploadSingleImage($iamge);
    public function uploadMultiImage($iamges);

}