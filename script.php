<?php

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class script{

    public function index(MailerInterface $mailer){

    //envoie du mail
        $email = (new Email())
        ->from('mathbroche@gmail.com')
        ->to("mathbroche@gmail.com")
        ->subject('Voici vos identifiants !')
        ->html('<p>Test</p>'
        );

        $mailer->send($email);
    }
}
?>