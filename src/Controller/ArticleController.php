<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'article_list')]
    public function list(): Response
    {
        //todo: Listing de tous les lieux enregistrés
        return $this->render('article/list.html.twig', [
            'controller_name' => 'LieuController',
        ]);
    }

    #[Route('/article/details/{id}', name: 'article_details')]
    public function details(int $id): Response
    {
        return $this->render('article/details.html.twig');
    }

    #[Route('/article/create', name: 'article_create')]
    public function create(): Response
    {
        return $this->render('article/create.html.twig');
    }

    #[Route('/article/update/{id}', name: 'article_update')]
    public function update(int $id): Response
    {
        return $this->render('article/update.html.twig');
    }

    #[Route('/article/delete/{id}', name: 'article_delete')]
    public function delete(int $id): Response
    {
        return $this->render('article/delete.html.twig');
    }
}
