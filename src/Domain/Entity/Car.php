<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\Wheel;
use App\Domain\ValueObject\Name;
use Ramsey\Uuid\UuidInterface;

class Car
{
    public function __construct(
        private UuidInterface $uuid,
        private Name $name,
        private Wheel $wheel,
    ) {
    }

    public function getId(): UuidInterface
    {
        return $this->uuid;
    }

    public function getName(): Name
    {
        return $this->name;
    }


    public function getWheels(): Wheel
    {
        return $this->wheel;
    }

}
