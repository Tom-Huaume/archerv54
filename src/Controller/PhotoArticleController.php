<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PhotoArticleController extends AbstractController
{
    #[Route('/photo/article', name: 'photo_article')]
    public function index(): Response
    {
        return $this->render('photo_article/index.html.twig', [
            'controller_name' => 'PhotoArticleController',
        ]);
    }
}
