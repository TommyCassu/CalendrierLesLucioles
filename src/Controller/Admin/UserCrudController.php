<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class UserCrudController extends AbstractCrudController
{
    //Configuration du CRUD Utilisateur
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            //Choix du titre affiché sur la page INDEX (principale)
            ->setPageTitle('index','%entity_label_singular%')
            //Titre de l'entity au singulier
            ->setEntityLabelInSingular("Utilisateur")
            //Titre de l'entity au pluriel
            ->setEntityLabelInPlural("Utilisateurs")
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('ID','id'),
            TextField::new('Username','Prénom'),
            TextField::new('nom','Nom'),
            TextField::new('email','Email'),
        ];
    }
    
    
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureActions(Actions $actions):Actions
    {
        //Création d'une nouvelle action
        $redirect = Action::new('redirect','')
            //indique quelle méthode suivre 
            ->linkToCrudAction('redirection')
            ->addCssClass('btn btn-success')
            ->setIcon('fas fa-pencil-alt');
        

        //Création d'une nouvelle action
        $addadmin = Action::new('addAdmin','')
            //indique quelle méthode suivre 
            ->linkToCrudAction('Admin')
            ->addCssClass('btn btn-danger')
            ->setIcon('fas fa-user-cog')
            ->displayIf(static function($entity){
                $role = $entity->getRoles();
                if($role[0] == 'ROLE_ADMIN'){
                    return true;
                };
            });

        //Création d'une nouvelle action
        $removeadmin = Action::new('removeAdmin','')
            //indique quelle méthode suivre 
            ->linkToCrudAction('Admin')
            ->addCssClass('btn btn-primary')
            ->setIcon('fas fa-user-cog')
            ->displayIf(static function($entity){
                $role = $entity->getRoles();
                if($role[0] != 'ROLE_ADMIN'){
                    return true;
                };
            });
            

    
        return $actions
                
                //ajoute notre nouvelle action sur la page index (page principale)
                ->add(Crud::PAGE_INDEX,$redirect)
                ->add(Crud::PAGE_INDEX,$removeadmin)
                ->add(Crud::PAGE_INDEX,$addadmin)
                ->remove(Crud::PAGE_INDEX,Action::EDIT)
                //changement couleur bouton Delete
                ->update(Crud::PAGE_INDEX,Action::DELETE, function(Action $action){
                    return $action
                    ->setLabel('')
                    ->setCssClass('btn btn-danger')
                    ->setIcon('fas fa-trash')
                    ;
                })
                //changement couleur bouton New
                ->update(Crud::PAGE_INDEX,Action::NEW, function(Action $action){
                    return $action->setCssClass('btn btn-primary');
                })
                ;
            // ->add(Crud::PAGE_INDEX, Action::EDIT)
            ;
    }
    public function redirection(EntityManagerInterface $entityManager,AdminContext $context):Response{
         $user = $context->getEntity()->getInstance();
        //redirige vers le main
        return $this->redirectToRoute('user_show',["id" =>$user->getId()]);
    }

    public function admin(EntityManagerInterface $entityManager,AdminContext $context):Response{
        $user = $context->getEntity()->getInstance();
        $userRole = $user->getRoles();

        if($userRole[0] == "ROLE_ADMIN"){
            //redirige vers le main
            $user->setRoles(['']);
            $entityManager->persist($user);
            $entityManager->flush();
        }else{
            $user->setRoles(['ROLE_ADMIN']);
            $entityManager->persist($user);
            $entityManager->flush();
        }
        return $this->redirectToRoute('admin');
    }
       
   
    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
