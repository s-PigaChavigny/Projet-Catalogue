<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UploadedImage
{
    public static function store(UploadedFile $image, string $folder, string $name): string
    {
        $imageFolder = 'image-' . $folder;
        $directory = public_path($imageFolder);
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $baseName = Str::slug($name) ?: 'sans-nom';
        $extension = strtolower($image->getClientOriginalExtension());
        $nameWithSuffix = $baseName;
        $fileName = $nameWithSuffix . '.' . $extension;
        $counter = 2;

        while (glob($directory . DIRECTORY_SEPARATOR . $nameWithSuffix . '.*')) {
            $nameWithSuffix = $baseName . '-' . $counter;
            $fileName = $nameWithSuffix . '.' . $extension;
            $counter++;
        }

        $image->move($directory, $fileName);

        return $imageFolder . '/' . $fileName;
    }
}