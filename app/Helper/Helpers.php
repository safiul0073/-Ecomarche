<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

if (! function_exists('imageUpload')) {
    function imageUpload($slug, $image)
    {
        if (is_array($image)) {
            $data = [];
            foreach ($image as $img) {
                $imageName = $img->getClientOriginalName();
                $path = "user_image/";
                $imageUniq = $slug.'-'.Carbon::now()->toDateString().'-'.uniqid();
                $imageUrl = $path.$imageUniq.$imageName;
                
                $img->move(storage_path($path), $imageUrl);
                $data[] = $imageUrl;
                return json_encode($data);
            }
        }else{
            $imageName = $image->getClientOriginalName();
            $path = "user_image/";
            $imageUniq = $slug.'-'.Carbon::now()->toDateString().'-'.uniqid();
            $imageUrl = $path.$imageUniq.$imageName;
            
            $image->move(storage_path($path), $imageUrl);
           return $imageUrl;
        }
       
    }
}

if (! function_exists('convertUTCToLocal')) {
    function convertUTCToLocal($time)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $time, 'UTC')->setTimezone('Europe/Paris');
    }
}
