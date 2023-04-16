<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login', methods: ['GET', 'POST'])]
public function handleLoginRequest(Request $request, EntityManagerInterface $entityManager): Response
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
            ->add('valider', SubmitType::class, [
                'attr' => [
                    'class' => 'form-group',
                ],
            ])

            ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $user = new User();
                $user->setEmail($form->get('email')->getData());
                $user->setPassword($form->get('password')->getData());
    
                $entityManager->persist($user);
                $entityManager->flush();
                        
                return $this->redirectToRoute('app_home');
            }
        
            return $this->render('login/index.html.twig', [
                'connexion' => $form->createView(),
            ]);
        }
}