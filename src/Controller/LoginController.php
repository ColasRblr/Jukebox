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
            
        
        ->add('email', EmailType::class,[
            "label" =>"Adresse mail : ",
            "attr" =>[
                "placeholder" =>"Entrez votre email",
                "class" => "form-group email-input",
                "row_attr" => "form-group"
            ],
            "row_attr" => [
                "class" => "form-group"
            ]
        ])

        ->add('password', PasswordType::class ,[
            "label" =>"Mot de passe: ",
            "attr" =>[
                "placeholder" =>"Entrez votre mot de passe",
                "class" => "form-group password-input"
            ],
            "row_attr" => [
                "class" => "form-group"
            ]
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

                //  dd($user);
            //     echo $user->getFirstname();
            //  echo $user->getLastname();
            // echo $user->getEmail();

    
                $entityManager->persist($user);
                $entityManager->flush();
                        
                return $this->redirectToRoute('app_home');
            }
        
            return $this->render('login/index.html.twig', [
                'connexion' => $form->createView(),
            ]);
        }
}