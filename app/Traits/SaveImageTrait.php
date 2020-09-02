<?php

namespace App\Traits;

Trait SaveImageTrait
{
    function SaveImage($photo,$folder)
    {
        $file_extenstion = $photo->getClientOriginalExtension();
        $file_name = time().'.'.$file_extenstion;
        $path = $folder;
        $photo->move($path,$file_name);
        return $file_name;
    }
}
