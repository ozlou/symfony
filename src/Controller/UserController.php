<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /** 
     * @Route("/testuser", name="users_list")
     */
    public function list(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('site/user.html.twig', [
            'users' => $users,
        ]);
    }

    /** 
     * @Route("/testuser/{id}", name="user_item")
     */
    public function item(User $category): Response
    {
        return $this->render('category/item.html.twig', [
            'category' => $category,
        ]);
    }
}