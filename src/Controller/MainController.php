<?php

namespace App\Controller;

use App\Repository\AnneeRepository;
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
    public function index(CalendarRepository $calendar, UserInterface $user, UserRepository $userRepository, FamilleRepository $familleRepository, AnneeRepository $anneeRepository)
    {
        ini_set('intl.default_locale', 'fr-FR');
        $user = $this->getUser();
        $famille = $this->getUser()->getFamille();
        $events = $calendar->findAll(); 
        $userse = $userRepository->findAll();
        $listeFamille = $familleRepository->findAll();
        $AnneeCalendrier = $anneeRepository->findAll();
        
        
        $nbgarde=[];
        foreach($listeFamille as $famille){
            $nbgarde[]=[
                'nb' => sizeof($famille->getCalendars()),
                'nom' => $famille->getNom(),
                'id' => $famille->getId(),
            ];
        }

        if ($user->getModifpass() != 0){
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
                    usort($listeDesGardes, function($a, $b) {
                        return ($a['dDebut'] < $b['dDebut']) ? -1 : 1;
                      });
            }
            $userRole = $user->getRoles();
   
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

        $anneeDuCalendrier= [];
        $anneeDuCalendrier=[
            'DateDebutCalendrier'=> $AnneeCalendrier[0]->getDateDebut()->format('Y-m-d H:i:s'),
            'DateFinCalendrier'=> $AnneeCalendrier[0]->getDateFin()->format('Y-m-d H:i:s')
        ];

        $data = json_encode($rdvs);
        $annees = json_encode($anneeDuCalendrier);
        //$lUsers = json_encode($ListeUsers);
        if (isset($listeDesGardes)){
            return $this->render('calendrier/index.html.twig',['data' => compact('data','user','annees'),'lGarde' => $listeDesGardes, 'utilisateurRole' => $userRole[0],'ListeUtilisateurs'=>$userse,'listeFamille' => $listeFamille, 'nbgarde' => $nbgarde]);
            
        }else{
            return $this->render('calendrier/index.html.twig',['data' => compact('data','user','annees'),'utilisateurRole' => $userRole[0], 'ListeUtilisateurs'=>$userse, 'listeFamille' => $listeFamille, 'nbgarde' => $nbgarde]);
        }
        
    }else{
        return $this->render('security/change.html.twig',['user' => $user]);
    }
}
}