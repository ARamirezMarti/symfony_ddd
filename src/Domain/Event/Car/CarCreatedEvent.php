<?php

namespace App\Domain\Event\Car;

use App\Domain\Entity\Car;
use App\Domain\Event\EventInterface;

class CarCreatedEvent implements EventInterface
{
    private Car $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

  

    public function car(): Car
    {
        return $this->car;
    }
}