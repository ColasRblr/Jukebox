<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;

#[Route('/user')]

class UserController extends AbstractController
{

    // #[Route('/', name: 'app_user_index', methods: ['GET'])]
    // public function index(): Response
    // {
    //     return $this->render('user/index.html.twig', [
    //         'users' => $userRepository->findAll(),
    //     ]);
    // }


}
