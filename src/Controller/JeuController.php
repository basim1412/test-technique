<?php

namespace App\Controller;

use App\Entity\Jeu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JeuController extends AbstractController
{
    #[Route('/jeu/{id}', name: 'voir_jeu')]
    public function voirJeu(Jeu $jeu): Response
    {
        return $this->render('jeu/voir.html.twig', [
            'jeu' => $jeu,
        ]);
    }
}
