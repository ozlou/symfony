<?php

namespace App\Controller;


use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use App\Repository\TypeRepository;
use App\Repository\UserRepository;
use App\Repository\VehicleRepository;
use Doctrine\DBAL\Types\TypeRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /** 
     * @Route("/", name="app_index")
     */
    public function list(AnnonceRepository $annonceRepository, TypeRepository $typeRepository, UserRepository $userRepository,VehicleRepository $vehicleRepository): Response
    {
        $annonces = $annonceRepository->findAll();
        $types = $typeRepository->findAll();
        $user = $userRepository->findAll();
        $vehicles = $vehicleRepository->findAll();

        return $this->render('index/index.html.twig', [
            'annonces' => $annonces,
            'type' => $types,
            'user'=> $user,
            'vehicle'=>$vehicles,
        ]);
    }

    /** 
     * @Route("/annonces/{id}", name="vehicle_detail")
     */
    public function item(Annonce $annonce): Response
    {
        return $this->render('site/detail.html.twig', [
            'annonce' => $annonce,
        ]);
    }
}