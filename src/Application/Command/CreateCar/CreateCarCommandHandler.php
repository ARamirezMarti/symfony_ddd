<?php

namespace App\Application\Command\CreateCar;

use App\Application\EventSyncBus\EventSyncBusInterface;
use App\Domain\Repository\CarRepositoryInterface;
use App\Domain\Entity\Car;
use App\Domain\Event\Car\CarCreatedEvent;

class CreateCarCommandHandler
{
    public function __construct(
        private CarRepositoryInterface $carRepository,
        private EventSyncBusInterface $eventBus
    ){}
    public function __invoke(CreateCarCommand $createCarCommand)
    {   
      $car = new Car($createCarCommand->getUuid(),$createCarCommand->name(),$createCarCommand->wheels());
      $this->carRepository->save( $car);
      
      $this->eventBus->publish(new CarCreatedEvent($car));
      
    }
}
