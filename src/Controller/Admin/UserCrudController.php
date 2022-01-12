<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureActions(Actions $actions):Actions
    {
        //Création d'une nouvelle action
        $redirect = Action::new('redirect','Editer')
            //indique quelle méthode suivre 
            ->linkToCrudAction('redirection')
            ->addCssClass('btn btn-success')
            ;

        return $actions
                //ajoute notre nouvelle action sur la page index (page principale)
                ->add(Crud::PAGE_INDEX,$redirect)
                ->remove(Crud::PAGE_INDEX,Action::EDIT)
                //changement couleur bouton Delete
                ->update(Crud::PAGE_INDEX,Action::DELETE, function(Action $action){
                    return $action->setCssClass('btn btn-danger');
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
