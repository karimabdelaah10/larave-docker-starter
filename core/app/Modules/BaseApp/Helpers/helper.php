<?php

use App\Modules\BaseApp\Enums\S3Enums;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

if (!function_exists('activeListElement')) {
    function activeListElement($modulePrefix): string
    {
        $currentRoute = Route::currentRouteName();
        $currentRoute = explode('.', $currentRoute);
        $currentRoute = $currentRoute[0];
        if ($currentRoute == $modulePrefix) {
            return 'active';
        }
        return '';
    }
}
if (!function_exists('reFormatImage')) {
    function reFormatImage($pathFrom, $width, $height, $imageExt, $pathTo, $resizeType): void
    {
        if (Storage::exists($pathFrom)) {
            $image = Intervention\Image\Facades\Image::make(getImagePath($pathFrom));
            if ($resizeType == S3Enums::RESIZE) {
                $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } elseif ($resizeType == S3Enums::CROP) {
                $image->fit($width, $height);
            }

            $image->encode($imageExt, 60);
            Storage::put($pathTo, $image->__toString());
        }
    }
}
if (!function_exists('getImageUrl')) {
    function getImageUrl($imagePath, $alt = null)
    {
        try {
            if (Storage::get($imagePath)) {
                return Storage::url($imagePath);
            }

        } catch (Exception $exception) {
            if ($alt) {
                return $alt;
            }
            return url("/dashboard_assets/images/avatar.png");
        }
        return url("/dashboard_assets/images/avatar.png");
    }
}
if (!function_exists('getImagePath')) {
    function getImagePath($imagePath, $alt = null)
    {
        try {
            if (Storage::get($imagePath)) {
                return Storage::path($imagePath);
            }

        } catch (Exception $exception) {
            if ($alt) {
                return $alt;
            }
            return url("/dashboard_assets/images/avatar.png");
        }
        return url("/dashboard_assets/images/avatar.png");
    }
}
if (!function_exists('deleteImage')) {
    function deleteImage($imagePath): void
    {
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
    }
}

if (!function_exists('image')) {
    function image($img, $type, $folder = 'uploads')
    {
        $path = $folder;
        if ($type != "") {
            $path .= "/" . $type;
        }
        $path .= "/" . $img;
        return getImageUrl($path);
    }
}
