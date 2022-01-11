<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GardeController extends AbstractController
{
    #[Route('/garde', name: 'garde')]
    public function index(): Response
    {
        return $this->render('garde/index.html.twig', [
            'controller_name' => 'GardeController',
        ]);
    }
}
