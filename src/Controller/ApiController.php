<?php 

namespace App\Controller;

use DateInterval;
use App\Entity\User;
use App\Entity\Famille;
use App\Entity\Calendar;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

session_start(); 
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
    public function createEvent(?Calendar $calendar, Request $request, EntityManagerInterface $em, UserInterface $user)
    {
       
        // On récupère le json et on le décode
        $donnees = json_decode($request->getContent(), true, 512, 0);
        $currentDateTime = date('c');
        $dateCourante = new \DateTime($currentDateTime);
        $dateCourante->add(new DateInterval('PT1H'));
        $dateStart = new \DateTime($donnees["start"]);
        $dateEnd = new \DateTime($donnees["end"]);

        if (
            ($dateCourante < $dateStart) || ($user->getRoles()[0] == "ROLE_ADMIN")
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
                        
            $famille = $em->getRepository(Famille::class)
                        ->find($donnees["famille_id"]);

                        
            //On hydrate l'objet avec les données
            

            $calendar->setTitle($donnees["title"]);
            $calendar->setDescription($donnees["description"]);
            $calendar->setStart($dateStart);
            $calendar->setEnd($dateEnd);
            $calendar->setAllDay($donnees["allDay"]);
            $calendar->setBackgroundColor($donnees["backgroundColor"]);
            $calendar->setBorderColor($donnees["borderColor"]);
            $calendar->setTextColor($donnees["textColor"]);
            $calendar->setUser($user);
            $calendar->setFamille($famille);
            $calendar->setDatePose($dateCourante);

            $em->persist($calendar);
            $em->flush();

            $_SESSION['dateDuDebut'] = $dateStart ;
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

        $currentDateTime = date('c');
        $dateCourante = new \DateTime($currentDateTime);
        $dateCourante->add(new DateInterval('PT1H'));
        
        

        if (
            true
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
            $calendar->setDatepose($dateCourante2);

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

    #[Route('/api/{id}/delete', name: 'api_event_delete', methods: ['POST','GET'])]
    public function deleteEvent(?Calendar $calendar, Request $request, EntityManagerInterface $em)
    {
        // on récupère les données
        //$donnees = json_decode($request->getContent(), true, 512, 0);
        
        $id = $calendar->getId();

        $currentDateTime = date('c');
        $dateCourante = new \DateTime($currentDateTime);
        
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
