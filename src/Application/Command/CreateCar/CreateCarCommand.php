<?php

namespace App\Application\Command\CreateCar;

use App\Domain\ValueObject\Wheel;
use App\Domain\ValueObject\Name;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class CreateCarCommand
{
    private function __construct(
        private UuidInterface $uuid,
        private Name $name,
        private Wheel $wheels,
    ) {
    }

    public static function create(int $wheels,string $name)
    {
        return new static(
            Uuid::uuid4(),
            Name::fromString($name),
            Wheel::create($wheels)
        );
    }

    public function wheels(): Wheel
    {
        return $this->wheels;
    }

 
    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    public function name(): Name
    {
        return $this->name;
    }
}
