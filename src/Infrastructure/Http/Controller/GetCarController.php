<?php

namespace App\Infrastructure\Http\Controller;

use App\Application\Query\GetCar\GetCarQuery;
use App\Domain\QueryBus\QueryBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetCarController extends AbstractController
{
    public function __construct(
        private QueryBusInterface $queryBus
    )
    {
    }
    
    #[Route(
        '/car/{uuid}',
        name: 'app_get_car',
        methods: 'GET'
    )]
    public function __invoke(        
        string $uuid
    ): JsonResponse {

        $queryCommand =  GetCarQuery::create($uuid);
        
        $car = $this->queryBus->handle($queryCommand);

        return  new JsonResponse($car ? $car->toArray() : null,JsonResponse::HTTP_OK);
    }
}
