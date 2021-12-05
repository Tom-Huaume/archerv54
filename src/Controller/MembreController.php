<?php

namespace App\Controller;

use App\Repository\MembreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends AbstractController
{
    #[Route('/admin/membre', name: 'membre_list')]
    public function index(
        MembreRepository $membreRepository
    ): Response
    {
        $membres = $membreRepository->findAll();

        return $this->render('membre/list.html.twig', [
            'membres' => $membres,
        ]);
    }
}
