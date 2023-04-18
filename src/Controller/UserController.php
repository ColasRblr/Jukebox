<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]

class UserController extends AbstractController
{

    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    // #[Route('/', name: 'app_profil_index', methods: ['GET'])]
    // public function profilIndex(UserRepository $userRepository): Response
    // {
    //     // $user = $userRepository->findByDataUser(1);
    //     // // // ATTENTION A CHANGER CONDITION DE LA METHODE QUAND LA CONNEXION SERA CREER

    //     // $form = $this->createForm(PersonType::class, $user);

    //     // // Récupérer les données de l'utilisateur
    //     // $firstname = $user->getFirstname();
    //     // $lastname = $user->getLastname();
    //     // $email = $user->getEmail();
    //     // $password = $user->getPassword();

    //     // // Passer les données de l'utilisateur à l'instance du formulaire
    //     // $form->setData([
    //     //     'firstname' => $firstname,
    //     //     'lastname' => $lastname,
    //     //     'email' => $email,
    //     //     'password' => $password,
    //     // ]);

    //     return $this->render('profil/index.html.twig', [
    //         //     'form' => $form->createView(),
    //     ]);
    // }
}
