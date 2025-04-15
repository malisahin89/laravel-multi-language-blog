<?php

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

if (!function_exists('convertToWebP')) {
    function convertToWebP($imageFile, $destinationPath, $quality = 80)
    {
        $mime = $imageFile->getClientMimeType();
        $allowedMimes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];

        if (!in_array($mime, $allowedMimes)) {
            throw new \Exception('Desteklenmeyen resim formatı: ' . $mime);
        }

        $fullPath = public_path($destinationPath);
        $folderPath = dirname($fullPath);

        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        // Intervention ImageManager ile WebP'e dönüştürme
        $manager = new ImageManager(new Driver());
        $manager->read($imageFile->getPathname())
            ->toWebp($quality)
            ->save($fullPath);
    }
}