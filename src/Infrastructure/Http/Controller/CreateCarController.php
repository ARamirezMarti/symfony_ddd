<?php

namespace App\Infrastructure\Http\Controller;

use App\Application\Command\CreateCar\CreateCarCommand;
use App\Domain\CommandBus\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class CreateCarController extends AbstractController
{
    public function __construct(private CommandBusInterface $commandBus)
    {
    }

    #[Route('/car', name: 'app_create_car', methods: 'POST')]
    public function __invoke(): JsonResponse
    {
        $command = CreateCarCommand::create(4,"citroen xsara");
        $this->commandBus->handle($command);

        return $this->json(data: [
            $command->wheels()->value(),
        ]);
    }
}
