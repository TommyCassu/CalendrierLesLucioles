<?php

namespace App\Controller;

use App\Entity\Annee;
use App\Entity\User;
use App\Repository\AnneeRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Security;

class AnneeController extends AbstractController
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/annee', name: 'annee')]
    public function index(): Response
    {
        return $this->render('annee/index.html.twig', [
            'controller_name' => 'AnneeController',
        ]);
    }

    #[Route('/annee/edit', name: 'annee_show', methods: ['GET'])]    
    public function show(Request $request): Response
    {
        $userLoggedId = $this->security->getUser()->getId();
        $userLoggedRoles = $this->security->getUser()->getRoles()[0];
        if ($userLoggedId == $request->get('id') || $userLoggedRoles == "ROLE_ADMIN"){
            return $this->render('annee/edit.html.twig', [
            ]);
        }else{
            return $this->redirectToRoute("/main");
        }
        
    }
    
    #[Route('/edit', name: 'annee_edit' )]
    public function editAnnee(Request $request,?Annee $annee,EntityManagerInterface $entityManager,AnneeRepository $anneeRepository): Response
    {
        $annee = $anneeRepository->findAll();
        //Verification mot de passe
            $anneeDebut = new DateTimeImmutable($request->request->get('anneeDebut'));
            $anneeFin = new DateTimeImmutable($request->request->get('anneeFin'));
                if ($anneeDebut != null){
                    if ($anneeFin != null){
                            $annee[0]->setDateDebut($anneeDebut);
                            $annee[0]->setDateFin($anneeFin);
                        }else{
                            $this->addFlash(
                                'alert',
                                'Veuillez saisir une date de fin'
                            );
                        }
                    }else{
                        $this->addFlash(
                            'alert',
                            'Veuillez saisir une date de début'
                        );
                    }

            $entityManager->persist($annee[0]);
            $entityManager->flush();

            return $this->redirectToRoute("admin");
}
}
