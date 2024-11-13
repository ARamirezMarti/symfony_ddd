<?php

namespace App\Infrastructure\Http\Repository;

use App\Domain\Repository\CarRepositoryInterface;
use App\Domain\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;

class CarRepository implements CarRepositoryInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(Car $car): void
    {        
        $this->entityManager->persist($car);
        $this->entityManager->flush();        
    }

    
}
