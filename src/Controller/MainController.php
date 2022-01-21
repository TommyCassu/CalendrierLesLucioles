<?php

namespace App\Controller;


use App\Repository\CalendarRepository;
use App\Repository\FamilleRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class MainController extends AbstractController
{
    

    #[Route('/main', name: 'main')]

    public function index(CalendarRepository $calendar, UserInterface $user, UserRepository $userRepository, FamilleRepository $familleRepository)
    {
        $user = $this->getUser();
        $famille = $this->getUser()->getFamille();
        $events = $calendar->findAll();   
  
        if ($user != NULL) {
            $familleId = $famille->getId();
            $userId = $user->getId();
            
            //dd($user->getCalendars());
                // Afficher la liste des gardes
            $ListeDesGardes = [];
            foreach ($user->getCalendars() as $calendar) {

                $title = $calendar->getTitle();
                $dateStart = $calendar->getStart();
                $dateEnd = $calendar->getEnd();
                $description = $calendar->getDescription();
                $allDay = $calendar->getAllDay();
                $backgroundColor = $calendar->getBackgroundColor();
                $textColor = $calendar->getTextColor();
                $borderColor = $calendar->getBorderColor();
                
                    $listeDesGardes[] = [
                        'title' => $title,
                        'dDebut' => $dateStart,
                        'dFin' => $dateEnd,
                        'description' => $description,
                        'allDay' => $allDay,
                        'backgroundColor' => $backgroundColor,
                        'textColor' => $textColor,
                        'borderColor' => $borderColor
                    ];
            }
            
        }



        
        $rdvs = [];
        foreach($events as $event){
            if($event->getEnd() != null){
                $rdvs[]= [
                    'id' => $event->getId(),
                    'user_id' => $event->getUser()->getId(),
                    'famille_id' => $event->getFamille()->getId(),
                    'start' => $event->getStart()->format('Y-m-d H:i:s'),
                    'title' => $event->getTitle(),
                    'description' => $event->getDescription(),
                    'backgroundColor' => $event->getBackgroundColor(),
                    'borderColor' => $event->getBorderColor(),
                    'textColor' => $event->getTextColor(),
                    'allDay' => $event->getAllDay(),
                    
                    'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                ];
            }else{
                $rdvs[]= [
                    'id' => $event->getId(),
                    'user_id' => $event->getUser()->getId(),
                    'famille_id' => $event->getFamille()->getId(),
                    'start' => $event->getStart()->format('Y-m-d H:i:s'),
                    'title' => $event->getTitle(),
                    'description' => $event->getDescription(),
                    'backgroundColor' => $event->getBackgroundColor(),
                    'borderColor' => $event->getBorderColor(),
                    'textColor' => $event->getTextColor(),
                    'allDay' => $event->getAllDay(),
                ];
            }
        }

        $data = json_encode($rdvs);
        if (isset($listeDesGardes)){
            return $this->render('calendrier/index.html.twig',['data' => compact('data','user'),'lGarde' => $listeDesGardes]);
            
        }else{
            return $this->render('calendrier/index.html.twig',['data' => compact('data','user')]);
        }

        
    }
}