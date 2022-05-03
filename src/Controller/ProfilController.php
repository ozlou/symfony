<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER',null, 'User tried to access a page without having ROLE_USER');
        $a = 1;
        $b = 8;
        $Somme = $a + $b;
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'age' => $Somme
        ]);
    }
}
