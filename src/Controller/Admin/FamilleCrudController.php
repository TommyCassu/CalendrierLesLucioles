<?php

namespace App\Controller\Admin;

use App\Entity\Famille;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FamilleCrudController extends AbstractCrudController
{


    //Configuration des Actions
    public function configureActions(Actions $actions):Actions
    {

        return $actions
                //changement couleur bouton Delete
                ->update(Crud::PAGE_INDEX,Action::DELETE, function(Action $action){
                    return $action
                    ->setLabel('')
                    ->setCssClass('btn btn-danger')
                    ->setIcon('fas fa-trash')
                    ;
                })
                ->update(Crud::PAGE_INDEX,Action::EDIT, function(Action $action){
                    return $action
                    ->setLabel('')
                    ->setCssClass('btn btn-success')
                    ->setIcon('fas fa-pencil-alt')
                    ;
                })
                //changement couleur bouton New
                ->update(Crud::PAGE_INDEX,Action::NEW, function(Action $action){
                    return $action->setCssClass('btn btn-primary');
                })
                ;
    }
    
    public static function getEntityFqcn(): string
    {
        return Famille::class;
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
