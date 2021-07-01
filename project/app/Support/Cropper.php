<?php

namespace LaraDev\Support;

class Cropper
{
    public static function thumb(string $uri, int $with, int $height = null)
    {
        $cropper = new \CoffeeCode\Cropper\Cropper('../public/storage/cache');
        $pathThumb = $cropper->make(config('filesystems.disks.public.root') . '/' . $uri, $with, $height);

        $file = 'cache/' . collect(explode('/', $pathThumb))->last();
        return $file;
    }

    public static function flush(?string $path)
    {
        $cropper = new \CoffeeCode\Cropper\Cropper('../public/storage/cache');

        if(!empty($path)) {
            $cropper->flush($path);
        } else {
            $cropper->flush();
        }
    }
}