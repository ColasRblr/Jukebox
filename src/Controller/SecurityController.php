<?php

namespace App\Controller;

use App\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\LoginFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route('/security')]
class SecurityController extends AbstractController
{
    #[Route('/', name: 'app_security')]
    // public function index(): Response
    // {
    //     return $this->render('user/index.html.twig', [
    //         'controller_name' => 'SecurityController',
    //     ]);
    // }


    #[Route('/', name: 'login_user')]
    public function loginUser()
    {
        // Création du formulaire de connexion
        // $form = $this->createForm(LoginFormType::class);

        return $this->render(
            'user/index.html.twig'
            // 'form' => $form->createView(),
        );
    }
}
