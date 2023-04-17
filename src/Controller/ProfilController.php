<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    // #[Route('/profil', name: 'app_profil_index', methods: ['GET'])]
    // public function index(UserRepository $userRepository): Response
    // {
    //     $profils = $userRepository->findByDataUser(1);

    //     return $this->render('profil/index.html.twig', [
    //         'profils' => $profils,
    //     ]);
    // }
}
