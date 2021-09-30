<?php

namespace App\Services\Image;


interface ImageInterface
{


    public function deleteSingleImage($image);
    public function deleteMultiImage($images);
    public function uploadSingleImage($image);
    public function uploadMultiImage($images);

}
