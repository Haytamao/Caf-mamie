<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CafeType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Cafe;
use Doctrine\ORM\EntityManagerInterface;

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
    #[Route('/ajoutCafe', name: 'app_ajoutCafe')]
    public function ajoutCafe(Request $request, EntityManagerInterface $em): Response
    {
        $cafe = new Cafe();
        $form = $this->createForm(CafeType::class, $cafe);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em->persist($contact);
                $em->flush();
                $this->addFlash('notice','Message envoyé');
                return $this->redirectToRoute('app_ajoutCafe');
            }
            }
        return $this->render('base/ajoutCafe.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
