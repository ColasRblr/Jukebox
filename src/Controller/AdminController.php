<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends PersonController
{
    // #[Route('/admin', name: 'app_admin')]
    // public function index(): Response
    // {
    //     return $this->render('admin/index.html.twig', [
    //         'controller_name' => 'AdminController',
    //     ]);
    // }
    public function deleteCategory(){

    }

    public function deleteSong(){

    }
    public function modifyCategory(){

    }

    public function modifySong(){

    }
    public function addCategory(){

    }
    
    public function addSong(){

    }
}
