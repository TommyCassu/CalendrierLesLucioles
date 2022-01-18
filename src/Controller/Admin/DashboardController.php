<?php

namespace App\Controller\Admin;

use App\Entity\Calendar;
Use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Dto\AssetsDto;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    private $routeBuilder;
    public function __construct(AdminUrlGenerator $routeBuilder)
    {
        $this->routeBuilder = $routeBuilder;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return parent::index();
        // $routeBuilder = $this->get(AdminUrlGenerator::class);
        //return $this->redirect($this->routeBuilder->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Les lucioles');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Calendrier', 'far fa-calendar', Calendar::class);
    }
}
