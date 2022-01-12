<?php

namespace App\Controller\Admin;

use App\Entity\User;
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
            ;
        return $actions
                //ajoute notre nouvelle action sur la page index (page principale)
                ->add(Crud::PAGE_INDEX,$redirect)
                ->remove(Crud::PAGE_INDEX,Action::EDIT)
            // ->add(Crud::PAGE_INDEX, Action::EDIT)
            ;
    }
    public function redirection(){
        //redirige vers le main
        return $this->redirectToRoute('app_login');
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
