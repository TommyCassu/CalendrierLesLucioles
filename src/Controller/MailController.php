<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
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

    #[Route('/sendRappel', name: 'sendRappel' )]
    public function sendRappel(MailerInterface $mailer,UserRepository $user): Response
    {

        $users =$user->findAll();
        foreach ($users as $user){
            $tableaugarde=[];
            foreach($user->getCalendars() as $calendar){
                if($calendar->getStart()->format("Y-m-d H:i:s") > date("Y-m-d H:i:s")){
                    $date = $calendar->getStart();
                    $tableaugarde[] = [
                        'date' => $date,
                    ];
                }
            }
                
            $email = (new TemplatedEmail())
            ->from('mathbroche@gmail.com')
            ->to($user->getEmail())
            ->subject('Voici le rappel de vos gardes !')
            // path of the Twig template to render
            ->htmlTemplate('mail/rappel.html.twig')
            // pass variables (name => value) to the template
            ->context([
                'tableaugarde' => $tableaugarde,
                'username' => $user->getUsername(),
            ])
        ;

            
            $mailer->send($email);
                
            
        }
        return $this->redirectToRoute("main");
        // ...
    }
}
