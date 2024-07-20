<?php

namespace App\Application\Command\CreateCar;

class CreateCarCommandHandler
{
    public function __invoke(CreateCarCommand $createCarCommand)
    {
        var_dump($createCarCommand->name());
        echo 'pepe';
    }
}
