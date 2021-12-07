<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Lieu;
use App\Form\EvenementType;
use App\Form\LieuType;
use App\Repository\EtapeRepository;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    #[Route('/evenement/liste', name: 'evenement_list')]
    public function list(
        EvenementRepository $evenementRepository
    ): Response
    {

        //générer le formulaire de création d'évènement
        $evenements = $evenementRepository->findAll();

        return $this->render('evenement/list.html.twig', [
            'evenements' => $evenements,
        ]);
    }

    #[Route('/admin/evenement/create', name: 'evenement_create')]
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


    #[Route('/evenement/{id}', name: 'evenement_detail')]
    public function detail(
        int $id,
        EvenementRepository $evenementRepository,
        EntityManagerInterface $entityManager,
        Request $request
    ): Response
    {
        $evenement = $evenementRepository->findOneBy(array('id' => $id));
        $etapes = $evenement->getEtapes();
        $trajets = $evenement->getTrajets();


        //MAJ BDD
//            $entityManager->persist($membre);
//            $entityManager->flush();

        return $this->render('evenement/detail.html.twig', [
            'evenement'=>$evenement,
            'etapes'=>$etapes,
            'trajets'=>$trajets
        ]);
    }

}
