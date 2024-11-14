<?php

namespace App\Application\Query\GetCar;

use Ramsey\Uuid\UuidInterface;
use Ramsey\Uuid\Uuid;

class GetCarQuery
{

    private function __construct(
        private UuidInterface $uuid,
    ) {
    }

    public static function create(string $uuid)
    {
        return new static(
            Uuid::fromString($uuid),
        );
    }

    public function uuid(): UuidInterface
    {
        return $this->uuid;
    }
}
