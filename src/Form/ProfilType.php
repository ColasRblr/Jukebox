<?php

namespace App\Form;

use App\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('email')
            ->add('password');

        // Récupérer les données existantes à partir du formulaire
        $data = $builder->getData();

        // Si des données existantes sont disponibles, les utiliser pour pré-remplir le formulaire
        if ($data instanceof Person) {
            $builder
                ->get('firstname')->setData($data->getFirstname())
                ->get('lastname')->setData($data->getLastname())
                ->get('email')->setData($data->getEmail())
                ->get('password')->setData($data->getPassword());
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
        ]);
    }
}
