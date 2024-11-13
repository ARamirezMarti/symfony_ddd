<?php

namespace App\Infrastructure\Http\Controller;

use App\Application\Command\CreateCar\CreateCarCommand;
use App\Domain\CommandBus\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CreateCarController extends AbstractController
{
    public function __construct(
        private CommandBusInterface $commandBus
    )
    {
    }

    #[Route(
        '/car',
        name: 'app_create_car',
        methods: 'POST'
    )]
    public function __invoke(
        Request $request
    
    ): JsonResponse
    {
        $data = json_decode($request->getContent(),true);
   
        $command = CreateCarCommand::create($data['wheels'],$data['name']);
        
        $this->commandBus->handle($command);

        return  new JsonResponse(null,JsonResponse::HTTP_CREATED);
    }
}
