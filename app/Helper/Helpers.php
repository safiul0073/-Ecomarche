<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

if (! function_exists('imageUpload')) {
    function imageUpload($image)
    {
            $imagename = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
            $imagepublicpath = public_path('storage/image');
            $image->move($imagepublicpath, $imagename);
            $imagepath = '/storage/image/'.$imagename;
            
           return $imagepath;
    }
}


