<?php

namespace App\Application\Command\CreateCar;

class UploadPhotoCarCommandHandler
{

    public function __invoke(UploadPhotoCarCommand $uploadPhotoCarCommand)
    {   
        echo "Uploading photo...". $uploadPhotoCarCommand->image()->originalName(). "\n";
        sleep(2);
        echo "Photo uploaded \n";
    }
}
