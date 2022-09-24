<?php

namespace App\Helpers;

class JobHelper
{
    /**
     * upload image
     *
     * @return string
     */
    public function uploadImage($imageUrl)
    {
        $path = $imageUrl->store('/public/images');
        return basename($path);
    }
}

