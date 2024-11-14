<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Car;
use Ramsey\Uuid\UuidInterface;

interface CarRepositoryInterface
{
    public function save(Car $car): void;
    public function search(UuidInterface $uuid): ?Car;

}
