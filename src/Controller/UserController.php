<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/edit', name: 'edit' )]
    public function edit(Request $request, Producteur $producteur, UserPasswordEncoderInterface $userPass): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        //Edition Nom
        if ($request->request->get('nom') != null) {
            $producteur->setNom($request->request->get('nom'));
        }

        //Edition Prenom
        if ($request->request->get('username') != null) {
            $producteur->setPrenom($request->request->get('username'));
        }

        //Edition Telephone
        if ($request->request->get('tel') != null) {
            $producteur->setTel($request->request->get('tel'));
        }

        //Edition Email
        if ($request->request->get('mail') != null) {
            $producteur->setMail($request->request->get('mail'));
        }

        //Verification mot de passe
        if ($request->request->get('passAnc') != null) {
            $oldPassword = $request->request->get('passAnc');
            $newPass = $request->request->get('pass');
            $newPassConf = $request->request->get('passConf');
            if ($userPass->isPasswordValid($producteur,$oldPassword)){
                if ($newPass != null){
                    if ($newPass == $newPassConf){
                        if ($newPass != $oldPassword ){
                            $passHash = ($userPass->encodePassword($producteur, $newPass)); 
                            $producteur->setMdp($passHash);
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
}
