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
    
    // Création d'une garde ( event ) 
    #[Route('/api/create', name: 'api_event_create', methods: ['POST'])]
    public function createEvent(?Calendar $calendar, Request $request, EntityManagerInterface $em)
    {
        // On récupère le json et on le décode
        $donnees = json_decode($request->getContent(), true, 512, 0);

        if (
            1 + 1 == 2
        ) {
            //Si les données sont complètes On initialise un code
            $code = 200;

            //On vérifie si l'id existe
            if (!$calendar) {
                // On instancie un rendez vous
                $calendar = new Calendar;

                //On change le code
                $code = 201;
            }
            $user = $em->getRepository(User::class)
                        ->find($donnees["user_id"]);

            //On hydrate l'objet avec les données
            $dateStart = new \DateTime($donnees["start"]);
            $dateEnd = new \DateTime($donnees["end"]);


            $calendar->setTitle($donnees["title"]);
            $calendar->setDescription($donnees["description"]);
            $calendar->setStart($dateStart);
            $calendar->setEnd($dateEnd);
            $calendar->setAllDay($donnees["allDay"]);
            $calendar->setBackgroundColor($donnees["backgroundColor"]);
            $calendar->setBorderColor($donnees["borderColor"]);
            $calendar->setTextColor($donnees["textColor"]);
            $calendar->setUser($user);

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

    #[Route('/api/{id}/edit', name: 'api_event_edit', methods: ['GET', 'POST'])]
    public function majEvent(?Calendar $calendar, Request $request, EntityManagerInterface $em)
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
            $dateEnd = new \DateTime($donnees["end"]);

            $calendar->setTitle($donnees["title"]);
            $calendar->setDescription($donnees["description"]);
            $calendar->setStart($dateStart);
            $calendar->setEnd($dateEnd);
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

    #[Route('/api/{id}/delete', name: 'api_event_delete', methods: ['POST'])]
    public function deleteEvent(?Calendar $calendar, Request $request, EntityManagerInterface $em)
    {
        // on récupère les données
        $donnees = json_decode($request->getContent(), true, 512, 0);
        $id = $calendar->getId();
        
        if (
            1 + 1 == 2
        ) {
            //les données sont complètes
            //On initialise un code
            $code = 200;

            //On vérifie si l'id existe
            if (!$calendar) {
                //On change le code
                $code = 404;
                return new Response('Event inexistant', 404);
            }
            $repository = $em->getRepository(Calendar::class);
            $event = $repository->find($id); 

            $em->remove($event);
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
