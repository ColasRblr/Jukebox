<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(): Response
    {
        $form = $this->createFormBuilder()
            
            ->add('Adresse_mail', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Votre adresse mail',
                    'class' => 'form-group',
                ],
            ])
            ->add('Mot_de_passe', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'Votre mot de passe',
                    'class' => 'form-group',
                ],
            ])
            ->add('Valider', SubmitType::class, [
                'attr' => [
                    'class' => 'form-group',
                ],
            ])

            ->getForm();

        return $this->render('login/index.html.twig', [
            'connexion' => $form->createView(),
        ]);
    }
}