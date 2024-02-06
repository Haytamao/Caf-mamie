<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/', name: 'app_base')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
        ]);
    }
    #[Route('/menu', name: 'app_menu')]
    public function menu(): Response
    {
        return $this->render('base/menu.html.twig', [
        ]);
    }
    #[Route('/boisson', name: 'app_boisson')]
    public function boisson(): Response
    {
        return $this->render('base/boisson.html.twig', [
        ]);
    }
}
