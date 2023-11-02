<?php

namespace App\Controller;

use App\Entity\Jeu;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        $jeux = $this->entityManager->getRepository(Jeu::class)->findAll();

        return $this->render('main/index.html.twig', [
            'jeux' => $jeux,
        ]);
    }

    #[Route('/jeu/{id}', name: 'voir_jeu')]
    public function voirJeu(Jeu $jeu): Response
    {
        return $this->render('main/jeu.html.twig', [
            'jeu' => $jeu,
        ]);
    }
}
