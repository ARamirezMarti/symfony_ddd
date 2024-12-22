<?php

namespace App\Application\Command\CreateCar;

use App\Domain\Entity\Image;

class UploadPhotoCarCommand
{
    private Image $image;
    
    public function __construct(
        string $originalName,
        string $mime,
        string $tmpFilePath,
        string $tmpFileName,
        string $base64Content
        
    ){
        $this->image = Image::create($originalName, $mime, $tmpFilePath, $tmpFileName, $base64Content);
    }

    public function image(): Image
    {
        return $this->image;
    }
}
