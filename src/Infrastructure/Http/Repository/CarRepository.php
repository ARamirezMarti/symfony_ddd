<?php

namespace App\Infrastructure\Http\Repository;

use App\Domain\Repository\CarRepositoryInterface;
use App\Domain\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\UuidInterface;


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

    public function search(UuidInterface $uuid): ?Car
    {
        $qb= $this->entityManager->createQueryBuilder();
        return $qb->select('c')
        ->from(Car::class,'c')
        ->where('c.uuid = :uuid')
        ->setParameter('uuid',$uuid->__tostring())
        ->getQuery()
        ->getOneOrNullResult();
    }
    
}
