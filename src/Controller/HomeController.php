<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Controller\SongController;
use App\Repository\SongRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        // Récupération de toutes les catégories de la table
        $categories = $categoryRepository->findAll();

        // Construction de la liste d'objets à partir des données récupérées
        $myData = [];
        foreach ($categories as $category) {
            $myData[] = [
                "categoryId" => $category->getId(),
                "categoryPath" => $category->getImage(),
                "categoryName" => $category->getName(),
                "categoryAlt" => $category->getName(),
            ];
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController', 'myData' => $myData
        ]);
    }
}
