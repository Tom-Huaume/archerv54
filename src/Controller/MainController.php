<?php

namespace App\Controller;

use App\Repository\EvenementRepository;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home(EvenementRepository $evenementRepository)
    {
        $evenements = $evenementRepository->findAll();

        return $this->render('main/home.html.twig', [
            "evenements" => $evenements
        ]);
    }


}