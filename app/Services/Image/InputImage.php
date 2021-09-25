<?php
namespace App\Services\Image;

class BrandComposer {

 
        function imageUpload($image)
        {
                $imagename = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
                $imagepublicpath = public_path('storage/image');
                $image->move($imagepublicpath, $imagename);
                $imagepath = '/storage/image/'.$imagename;
                
               return $imagepath;
        }
    
}