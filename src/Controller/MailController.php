<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\User\UserInterface;

class MailController extends AbstractController
{
    #[Route('/mail', name: 'mail')]
    public function index(): Response
    {
        return $this->render('mail/index.html.twig', [
            'controller_name' => 'MailController',
        ]);
    }

    #[Route('/sendLogins', name: 'sendLogins' )]
    public function sendLogins(MailerInterface $mailer,UserRepository $user): Response
    {
        $users =$user->findAll();
        
        foreach ($users as $user){
        $email = (new Email())
            ->from('mathbroche@gmail.com')
            ->to($user->getEmail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Voici vos identifiants !')
            ->html('<p class="text-2xl">Votre nom est '.$user->getEmail().'</p>
            <br>'.'Votre mot de passe est '.$user->getPassword().''
            );

        $mailer->send($email);
        }
        return $this->redirectToRoute("main");
        // ...
    }
}
