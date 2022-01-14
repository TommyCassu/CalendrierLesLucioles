<?php

namespace App\Controller\Admin;

use App\Entity\Calendar;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CalendarCrudController extends AbstractCrudController
{
    //Configuration du CRUD Utilisateur
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            //Choix du titre affiché sur la page INDEX (principale)
            ->setPageTitle('index','Historique des %entity_label_plural%')
            //Titre de l'entity au singulier
            ->setEntityLabelInSingular("Garde")
            //Titre de l'entity au pluriel
            ->setEntityLabelInPlural("Gardes")
        ;
    }



    //Configuration des Actions
    public function configureActions(Actions $actions):Actions
    {

        return $actions
                ->remove(Crud::PAGE_INDEX,Action::EDIT)
                ->remove(Crud::PAGE_INDEX,Action::NEW)
                //changement couleur bouton Delete
                ->update(Crud::PAGE_INDEX,Action::DELETE, function(Action $action){
                    return $action
                    ->setLabel('')
                    ->setCssClass('btn btn-danger')
                    ->setIcon('fas fa-trash')
                    ;

                })
            // ->add(Crud::PAGE_INDEX, Action::EDIT)
            ;
    }


    public static function getEntityFqcn(): string
    {
        return Calendar::class;
    }

    //Configuration des champs
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('ID'),
            TextField::new('title'),
            DateTimeField::new('start'),
            TextField::new('background_color'),
            TextField::new('border_color'),
        ];
    }
    
}
