<?php

namespace App\Infrastructure\Http\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class CreateCarController extends AbstractController
{
    #[Route('/car', name: 'app_create_car',methods: 'POST')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CreateCarController.php',
        ]);
    }
}
