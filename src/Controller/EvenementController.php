<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Lieu;
use App\Form\EvenementType;
use App\Form\LieuType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    #[Route('/admin/evenement', name: 'evenement_create', methods: ['GET'])]
    public function create(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {

        //générer le formulaire de création d'évènement
        $evenement = new Evenement();
        $evenementForm = $this->createForm(EvenementType::class, $evenement);
        $evenementForm->handleRequest($request);

        //générer le formulaire de création du lieu
        $lieu = new Lieu();
        $lieuForm = $this->createForm(LieuType::class, $lieu);
        $lieuForm->handleRequest($request);

        if($evenementForm->isSubmitted() && $evenementForm->isValid())
        {
            $evenement->setEtat("ouvert");
            $entityManager->persist($evenement);
            $entityManager->flush();

            $this->addFlash('success', 'Evènement engristré');
            return $this->redirectToRoute('evenement_create');
        }

        if($lieuForm->isSubmitted() && $lieuForm->isValid()){

            $lieu->setClub(0);
            $entityManager->persist($lieu);
            $entityManager->flush();

            $this->addFlash('success', 'Lieu engristré');
            return $this->redirectToRoute('evenement_create');
        }

        return $this->render('evenement/create.html.twig', [
            'evenementForm' => $evenementForm->createView(),
            'lieuForm' => $lieuForm->createView(),
        ]);
    }


    #[Route('/admin/evenement/{id}', name: 'evenement_detail', methods: ['GET'])]
    public function detail(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        return $this->render('evenement/create.html.twig', [
        ]);
    }

}
