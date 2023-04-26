<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Person;
use App\Form\PersonType;
use App\Repository\PersonRepository;
use App\Entity\Song;
use App\Form\SongType;
use App\Repository\SongRepository;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Repository\AdminRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends PersonController
{
    public function index(PersonRepository $personRepository): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/admin', name: 'app_sho')]
    public function admin_index(CategoryRepository $categoryRepository): Response
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
        
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController', 'myData' => $myData
        ]);
    }
    #[Route('/adminSong', name: 'app_show')]
    public function admin_category_index(CategoryRepository $categoryRepository): Response
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
        
        return $this->render('admin/adminSong.html.twig', [
            'controller_name' => 'AdminController', 'myData' => $myData
        ]);
    }

    // #[Route('/adminSong', name: 'app_show')]
    // public function admin_song_index(SongRepository $songRepository): Response
    // {
    //     // Récupération de toutes les catégories de la table
    //     $songs = $songRepository->findAll();


    //     // Construction de la liste d'objets à partir des données récupérées
    //     $myData = [];
    //     foreach ($songs as $song) {
    //         $myData[] = [
    //             "songId" => $song->getId(),
    //             "categoryId" => $song->getImage(),
    //             "title" => $song->getName(),
    //             "categoryAlt" => $song->getName(),
    //         ];
    //     }
        
    //     return $this->render('admin/adminSong.html.twig', [
    //         'controller_name' => 'AdminController', 'myData' => $myData
    //     ]);
    // }



}
