<?php

namespace App\Controller;

use App\Entity\Calendar;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/api/{id}/edit', name: 'api_event_edit', methods: ['GET', 'POST'])]
    public function majEvent(?Calendar $calendar, Request $request, EntityManagerInterface $em,User $user)
    {
        // on récupère les données
        $donnees = json_decode($request->getContent(), true, 512, 0);

        
        if (
            1 + 1 == 2
        ) {
            //les données sont complètes
            //On initialise un code
            $code = 200;

            //On vérifie si l'id existe
            if (!$calendar) {
                // On instancie un rendez vous
                $calendar = new Calendar;

                //On change le code
                $code = 201;
            }

            //On hydrate l'objet avec les données
            $dateStart = new \DateTime($donnees["start"]);

            $calendar->setTitle($donnees["title"]);
            $calendar->setDescription($donnees["description"]);
            $calendar->setStart($dateStart);
            $calendar->setAllDay($donnees["allDay"]);
            $calendar->setBackgroundColor($donnees["backgroundColor"]);
            $calendar->setBorderColor($donnees["borderColor"]);
            $calendar->setTextColor($donnees["textColor"]);

            $em->persist($calendar);
            $em->flush();

            // On retourne le code
            return new Response('Ok', $code);
        } else {
            //les données sont incomplètes
            return new Response('Données incomplètes', 404);
        }

        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}
