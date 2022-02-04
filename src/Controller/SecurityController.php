<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\FamilleRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    #[Route('/inscription', name: 'security_registration')]
    public function registration(Request $request,EntityManagerInterface $manager, UserPasswordHasherInterface $encoder,MailerInterface $mailer,FamilleRepository $familleRepository)
    {
        //génère un mdp aléatoire
        $n=10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $f=$familleRepository->findAll();
        $listefamille=[];
        foreach ($f as $famille) {
            $nom = $famille->getNom();
            $id = $famille->getId();
                
                $listefamille[] = array(
                    'nom' => $nom,
                    'id' => $id,
                );
        }

        $user = new User();
        $form = $this->createForm(RegistrationType::class,$user);
        //récupérer réponse
        $form->handleRequest($request);
        //si formulaire valide, on persiste en bdd
        if($form->isSubmitted()&&$form->isValid()){
            $famillechoisi = $familleRepository->find($request->request->get('lesfamilles'));
            $plaintextPassword = $user->getPassword();
            
            //envoie du mail
            $email = (new Email())
            ->from('mathbroche@gmail.com')
            ->to($user->getEmail())
            ->subject('Voici vos identifiants !')
            ->html('<p>Votre nom est '.$user->getEmail().'</p>
            <br>'.'Votre mot de passe est '.$user->getPassword().''
            );

            $mailer->send($email);

            // hash the password (based on the security.yaml config for the $user class)
            $hashedPassword = $encoder->hashPassword(
                $user,
                $plaintextPassword
            );
            $user->setPassword($hashedPassword);
            $user->setModifpass("0");
            $user->setFamille($famillechoisi);
            $manager->persist($user);
            $manager->flush();
            return new RedirectResponse('main');
        }
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView(),
            'randommdp'=> $randomString,
            'familles'=> $listefamille,
        ]);
    }


    #[Route('/security', name: 'security')]
    public function index(): Response
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
     * @Route("/", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }
        

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }


    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
