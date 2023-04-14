<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('person_id')
            // ->add('Prénom', TextType::class,[
            //     "label" =>"Nom : ",
            //     "attr" =>[
            //         "placeholder" =>"Entrez votre nom",
            //         "class" => "form-group firstName-input",
            //         "row_attr" => "form-group"
            //     ],
            //     "row_attr" => [
            //         "class" => "form-group"
            //     ]
            

            // ])
            // ->add('Nom', TextType::class,[
            //     "label" =>"nom : ",
            //     "attr" =>[
            //         "placeholder" =>"Entrez votre prenom",
            //         "class" => "form-group firstName-input",
            //         "row_attr" => "form-group"
            //     ],
            //     "row_attr" => [
            //         "class" => "form-group"
            //     ]
            

            // ])
            // ->add('Email', EmailType::class,[
            //     "label" =>"Adresse mail : ",
            //     "attr" =>[
            //         "placeholder" =>"Entrez votre email",
            //         "class" => "form-group email-input",
            //         "row_attr" => "form-group"
            //     ],
            //     "row_attr" => [
            //         "class" => "form-group"
            //     ]
            
                

            // ])
            // ->add('Mot_de_passe', PasswordType::class ,[
            //     "label" =>"Mot de passe: ",
            //     "attr" =>[
            //         "placeholder" =>"Entrez votre mot de passe",
            //         "class" => "form-group password-input"
            //     ],
            //     "row_attr" => [
            //         "class" => "form-group"
            //     ]
            // ])
            // ->add('Valider', SubmitType::class, [
            //     'row_attr' => [
            //         'class' => 'form-group'
            //     ],
            //     'attr' => [
            //         'class' => 'btn btn-left'
            //     ]
            // ])
            
            // ->add('Annuler', SubmitType::class, [
            //     'row_attr' => [
            //         'class' => 'form-group'
            //     ],
            //     'attr' => [
            //         'class' => ''
            //     ]
            // ]);
            
            
           
            

        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
    
}









