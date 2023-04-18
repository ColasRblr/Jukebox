<?php

namespace App\Controller;


use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();

        $form = $this->createFormBuilder($user)

            ->add('firstname', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre nom',
                    'class' => 'form-group'
                ],
            ])

            ->add('lastname', TextType::class,[
                "label" =>"Nom : ",
                "attr" =>[
                    "placeholder" =>"Entrez votre nom",
                    "class" => "form-group firstName-input",
                    "row_attr" => "form-group"
                ],
                "row_attr" => [
                    "class" => "form-group"
                ]
            ])

            ->add('firstname', TextType::class,[
                "label" =>"Prénom : ",
                "attr" =>[
                    "placeholder" =>"Entrez votre nom",
                    "class" => "form-group firstName-input",
                    "row_attr" => "form-group"
                ],
                "row_attr" => [
                    "class" => "form-group"
                ]
            ])

            ->add('Email', EmailType::class,[
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
            ->add('Valider', SubmitType::class, [
                'attr' => [
                    'class' => 'form-group'
                ]
            ])

            ->add('Annuler', SubmitType::class, [
                'attr' => [
                    'class' => 'form-group'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            //   dd($user);
            
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'inscription' => $form->createView()
        ]);
    }

}
