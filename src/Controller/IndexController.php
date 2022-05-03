<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(MailerInterface $mailer): Response
    {
        
        return $this->render('index/index.html.twig', [
            'controller_name' => 'page home',
        ]);
    }
}
