<?php

namespace App\Application\Query\GetCar;

use App\Domain\Repository\CarRepositoryInterface;

class GetCarQueryHandler
{
    public function __construct(
        private CarRepositoryInterface $carRepository
    ){}

    public function __invoke(GetCarQuery $getCarQuery)
    {          
      return $this->carRepository->search($getCarQuery->uuid());
    }
}