<?php

namespace App\Controller;

use App\Entity\Song;
use App\Form\SongType;
use App\Repository\SongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/song')]
class SongController extends AbstractController
{
    #[Route('/', name: 'app_song_index', methods: ['GET'])]
    public function index(SongRepository $songRepository): Response
    {
        return $this->render('song/index.html.twig', [
            'songs' => $songRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_song_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SongRepository $songRepository): Response
    {
        $song = new Song();
        $form = $this->createForm(SongType::class, $song);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $songRepository->save($song, true);

            return $this->redirectToRoute('app_song_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('song/new.html.twig', [
            'song' => $song,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_song_show', methods: ['GET'])]
    public function show(Song $song): Response
    {
        return $this->render('song/show.html.twig', [
            'song' => $song,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_song_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Song $song, SongRepository $songRepository): Response
    {
        $form = $this->createForm(SongType::class, $song);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $songRepository->save($song, true);

            return $this->redirectToRoute('app_song_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('song/edit.html.twig', [
            'song' => $song,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_song_delete', methods: ['POST'])]
    public function delete(Request $request, Song $song, SongRepository $songRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $song->getId(), $request->request->get('_token'))) {
            $songRepository->remove($song, true);
        }

        return $this->redirectToRoute('app_song_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/', name: 'get_songs_by_category', methods: ['POST'])]
    public function getSongsByCategory(SongRepository $songRepository, Request $request): JsonResponse
    {
        $category_id = $request->request->get('category_id');

        // Récupérer les chansons correspondant à la catégorie sélectionnée
        $songs = $songRepository->findBy(['category' => $category_id]);
        $response = [];
        foreach ($songs as $song) {
            $response[] = [
                'id' => $song->getId(),
                'title' => $song->getTitle(),
                'artist' => $song->getArtist(),
                'duration' => $song->getDuration(),
                'path_song' => $song->getPathSong(),
                // Autres données à renvoyer...
            ];
        }
        // Convertir le tableau $response en chaîne de caractères JSON
        $jsonResponse = new JsonResponse($response);

        return $jsonResponse;
    }


    public function showSongById(SongRepository $songRepository, $id)
    {
        $song = $songRepository->find($id);

        // Créer un tableau associatif avec les données de la chanson
        $songData = [
            'title' => $song->getTitle(),
            'artist' => $song->getArtist(),
            'duration' => $song->getDuration(),
            'path_song' => $song->getPathSong(),
        ];

        // Retourner les données de la chanson au format JSON
        return $this->json($songData);
    }
}
