<?php

namespace App\Controller;
use App\Entity\Campaign;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            
        ]);
    }
    public function pasindex(EntityManagerInterface $entityManager): Response
    {
        $campaigns = $entityManager
            ->getRepository(Campaign::class)
            ->findAll();
        return $this->render('campaign/index.html.twig', [
            'campaigns' => $campaigns,

        ]);
    }
}