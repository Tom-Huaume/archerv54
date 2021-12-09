<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtapeController extends AbstractController
{
    #[Route('/etape/create', name: 'etape')]
    public function index(): Response
    {
        return $this->render('etape/create.html.twig', [
        ]);
    }
}
