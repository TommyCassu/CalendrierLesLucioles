<?php

namespace App\Controller;

use App\Entity\Calendar;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/api/{id}/edit', name: 'api_event_edit', methods:['GET', 'POST'])]
    public function majEvent(?Calendar $calendar, Request $request)
    {
        // on récupère les données
        //$donnees = json_encode($request->getContent());
        $donnees = json_decode($request->getContent(), true , 512 , 0);

        if(
            1+1==2
            ){
                //les données sont complètes
                //On initialise un code
                $code = 200;

                //On vérifie si l'id existe
                if(!$calendar){
                    // On instancie un rendez vous
                    $calendar = new Calendar;

                    //On change le code
                    $code = 201;
                }

                //On hydrate l'objet avec les données
                $datestart = date_create_from_format("yyyy-MM-dd'T'HH:mm:ss.Z", $donnees["start"],);
                //$date = DateTime::createFromFormat("yyyy-MM-dd'T'HH:mm:ss.Z", $donnees["start"]);
                //$date = new DateTime($donnees["start"]);
                //date_format($date, 'Y-m-d H:i:s');

                dd($datestart);
                $calendar->setTitle($donnees["title"]);
                
                $calendar->setDescription($donnees["description"]);
                $calendar->setStart($donnees["start"]);
                $calendar->setAllDay($donnees["allDay"]);
                $calendar->setBackgroundColor($donnees["backgroundColor"]);
                $calendar->setBorderColor($donnees["borderColor"]);
                $calendar->setTextColor($donnees["textColor"]);

                $em = $this->getDoctrine()->getManager();
                $em->persist($calendar);
                $em->flush();

                // On retourne le code
                return new Response('Ok',$code);
            }else{
                //les données sont incomplètes
                return new Response('Données incomplètes', 404);
            }

        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}
