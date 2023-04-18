<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class ProfilController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @Route("/profile", name="profile_show")
     */
    public function show()
    {
        $user = $this->security->getUser();

        if ($user instanceof User) {
            // l'utilisateur connecté est un utilisateur
            $person = $user->getPersonId();
        } elseif ($user instanceof Admin) {
            // l'utilisateur connecté est un administrateur
            $person = $user->getPersonId();
        } else {
            throw new \Exception('Utilisateur inconnu');
        }

        return $this->render('person/show.html.twig', [
            'person' => $person,
        ]);
    }
}
