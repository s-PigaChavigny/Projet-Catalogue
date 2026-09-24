<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UploadedImage
{
    public static function store(UploadedFile $image, string $folder, string $name): string
    {
        $directory = public_path($folder);
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $baseName = Str::slug($name) ?: 'image';
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

        return $folder . '/' . $fileName;
    }
}