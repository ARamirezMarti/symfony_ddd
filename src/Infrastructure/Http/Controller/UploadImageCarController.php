<?php

namespace App\Infrastructure\Http\Controller;

use App\Application\Command\CreateCar\UploadPhotoCarCommand;
use App\Application\EventAsyncBus\EventAsyncBusInterface;
use App\Domain\CommandBus\CommandBusInterface;
use App\Domain\Event\Car\CarPhotoUploadedEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class UploadImageCarController extends AbstractController
{
    public function __construct(
        private CommandBusInterface $commandBus,
        private EventAsyncBusInterface $rabbitMqBus    
    )
    {
    }

    #[Route(
        '/car/image',
        name: 'app_upload_image_car',
        methods: 'POST'
    )]
    public function __invoke(
        Request $request,
      
    ): JsonResponse
    {    
        $command = $this->getCommand($request);

        $this->rabbitMqBus->publish(CarPhotoUploadedEvent::create($command));

        return  new JsonResponse(null,JsonResponse::HTTP_CREATED);       

    }
    
    private function getcommand(Request $request): UploadPhotoCarCommand
    {   
        $file = $request->files->get('photo');
        
        return new UploadPhotoCarCommand(
            $file->getClientOriginalName(),
            $file->getClientMimeType(),
            $file->getPath(),
            $file->getBasename(),
            base64_encode(file_get_contents($file->getPathname()
        )));
    }

}
