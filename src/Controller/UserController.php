<?php

namespace App\Controller;

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
    public function index(): Response
    {
        $form = $this->createFormBuilder()
                    ->add('Nom',TextType::class,[
                        "attr"=>[
                            "placeholder"=>"Votre nom",
                            "class"=>"forme-group"
                        ],
                            
                    ])
                    ->add('Prenom', TextType::class,[
                        "attr"=>[
                             
                            "placeholder"=>"Votre prenom",
                            "class"=>"forme-group"
                            ]
                    ])
                    ->add('Adresse_mail', EmailType::class,[
                        "attr"=>[
                             
                            "placeholder"=>"Votre adresse mail",
                            "class"=>"forme-group"

                            ]
                           
                    ])
                    ->add('Mot_de_passe', PasswordType::class,[
                        "attr"=>[
                            "placeholder"=>"Votre mot de passe",
                            "class"=>"forme-group"
                        ]

                    ])
                    ->add('Valider', SubmitType::class,[
                        'attr' => [
                            'class' => 'forme-group'
                        ]
                    ])
                        

                    ->add('Annuler', SubmitType::class,[
                        'attr' => [
                            'class' => 'forme-group'
                        ]
                    ])

                    ->getForm()
        ;
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'inscription' =>$form->createView()
        ]);
    }
    
}
