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

    public function id(): UuidInterface
    {
        return $this->uuid;
    }

    public function name(): Name
    {
        return $this->name;
    }


    public function wheels(): Wheel
    {
        return $this->wheel;
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->id()->__tostring(),
            'name' => $this->name()->value(),
            'wheels' => $this->wheels()->value()
        ];
    }

}
