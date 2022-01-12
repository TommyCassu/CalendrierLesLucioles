<?php

namespace App\Controller\Admin;

Use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
            ->setTitle('Leslucioles');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-list', User::class);
    }
}
