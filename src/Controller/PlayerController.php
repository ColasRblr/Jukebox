<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Controller\SongController;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class PlayerController extends AbstractController
{

    #[Route("/player/{id}/{category_id}", name: "app_player_show")]
    public function showSong($id, $category_id)
    {
        // Appeler la méthode showSongById du SongController pour récupérer les données de la chanson
        $response = $this->forward(SongController::class . '::showSongById', [
            'id' => $id,
        ]);

        // Récupérer les données de la chanson à partir de la réponse JSON
        $songData = $response->getContent();
        $song = json_decode($songData);

        // Afficher la vue du player avec les données de la chanson
        return $this->render('player/player.html.twig', [
            'song' => $song,
            'category_id' => $category_id
        ]);
    }
}
