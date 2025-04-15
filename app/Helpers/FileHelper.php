<?php

if (!function_exists('generateUniqueFilePath')) {
    /**
     * Benzersiz bir dosya yolu oluşturur.
     *
     * @param string $folderPath   Kaydedilecek klasör (örn: 'uploads/images')
     * @param string $fileName     Dosya adı (örn: 'photo')
     * @param string $extension    Dosya uzantısı (örn: 'webp')
     * @return string              Tam dosya yolu (örn: '/var/www/public/uploads/images/photo_1.webp')
     */
    function generateUniqueFilePath($folderPath, $fileName, $extension)
    {
        // Klasör yoksa oluştur
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        // İlk kontrol için tam yol
        $baseName = $fileName . '.' . $extension;
        $fullPath = $folderPath . DIRECTORY_SEPARATOR . $baseName;

        // Dosya adı çakışıyorsa sayı ekle
        $counter = 1;
        while (file_exists($fullPath)) {
            $newName = $fileName . '_' . $counter;
            $fullPath = $folderPath . DIRECTORY_SEPARATOR . $newName . '.' . $extension;
            $counter++;
        }

        return $fullPath;
    }
}
