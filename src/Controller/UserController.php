<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/{id}', name: 'user_show', methods: ['GET'])]    
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    

    #[Route('/{id}/edit', name: 'user_edit' )]
    public function edit(Request $request, User $user, UserPasswordHasherInterface $userPass, EntityManagerInterface $entityManager): Response
    {
        //Edition Nom
        if ($request->request->get('nom') != null) {
            $user->setNom($request->request->get('nom'));
        }

        //Edition Prenom
        if ($request->request->get('username') != null) {
            $user->setUsername($request->request->get('username'));
        }

        //Edition Email
        if ($request->request->get('mail') != null) {
            $user->setEmail($request->request->get('mail'));
        }

        //Verification mot de passe
        if ($request->request->get('passAnc') != null) {
            $oldPassword = $request->request->get('passAnc');
            $newPass = $request->request->get('pass');
            $newPassConf = $request->request->get('passConf');
            if ($userPass->isPasswordValid($user,$oldPassword)){
                if ($newPass != null){
                    if ($newPass == $newPassConf){
                        if ($newPass != $oldPassword ){
                            $passHash = ($userPass->hashPassword($user, $newPass)); 
                            $user->setPassword($passHash);
                        }else{
                            $this->addFlash(
                                'alert',
                                'Votre nouveau mot de passe ne peut pas être identique a votre mot de passe actuel'
                            );
                        }
                    }else{
                        $this->addFlash(
                            'alert',
                            'Veuillez entrez deux mot de passe identique'
                        );
                    }
                }else{
                    $this->addFlash(
                        'alert',
                        'Veuillez rentrer le nouveau mot de passe'
                    );
                }
            }
        }

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute("main");
}
}
