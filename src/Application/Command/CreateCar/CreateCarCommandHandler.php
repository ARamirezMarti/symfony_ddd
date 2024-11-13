<?php

namespace App\Application\Command\CreateCar;

use App\Domain\Repository\CarRepositoryInterface;
use App\Domain\Entity\Car;

class CreateCarCommandHandler
{
    public function __construct(
        private CarRepositoryInterface $carRepository
    ){}
    public function __invoke(CreateCarCommand $createCarCommand)
    {   
      
      $this->carRepository->save(
        new Car($createCarCommand->getUuid(),$createCarCommand->name(),$createCarCommand->wheels())
      );
    }
}
