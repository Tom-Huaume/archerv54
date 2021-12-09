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

        $evenementForm = $this->createForm(EvenementType::class, null);
        $evenementForm->handleRequest($request);

        //Traitement du formulaire
        if($evenementForm->isSubmitted() && $evenementForm->isValid())
        {
            //Etat ouvert par défaut


            //Récupérer les données du formulaire evenement
            $lieuDestination = $evenementForm["lieuDestination"]->getData();
            $nom = $evenementForm["nom"]->getData();
            $description = $evenementForm["description"]->getData();
            $dateHeureDebut = $evenementForm["dateHeureDebut"]->getData();
            $dateHeureLimiteInscription = $evenementForm["dateHeureLimiteInscription"]->getData();
            $nbInscriptionsMax = $evenementForm["nbInscriptionsMax"]->getData();
            $tarif = $evenementForm["tarif"]->getData();
            $photo = $evenementForm["photo"]->getData();

            //Créer objet evenement
            $evenement = new Evenement();
            $evenement->setNom($nom);
            $evenement->setDescription($description);
            $evenement->setDateHeureDebut($dateHeureDebut);
            $evenement->setDateHeureLimiteInscription($dateHeureLimiteInscription);
            $evenement->setNbInscriptionsMax($nbInscriptionsMax);
            $evenement->setTarif($tarif);
            $evenement->setPhoto($photo);
            $evenement->setEtat("ouvert");
            $evenement->setDateHeureCreation(new \DateTime('now'));

//            if($lieuDestination == null){
//                //Récupérer les données du formulaire lieu
//                $nomlieu = $evenementForm["nomlieu"]->getData();
//                $rue = $evenementForm["rue"]->getData();
//                $rue2 = $evenementForm["rue2"]->getData();
//                $codePostal = $evenementForm["codePostal"]->getData();
//                $ville = $evenementForm["ville"]->getData();
//
//                //Construire objet lieu
//                $lieu = new Lieu();
//                $lieu->setNom($nomlieu);
//                $lieu->setRue();
//                $lieu->setNom($nomlieu);
//                $lieu->setNom($nomlieu);
//                $lieu->setNom($nomlieu);
//            }

            //Persister les données
            dd($evenement);
            $entityManager->persist($evenement);
            $entityManager->flush();

            $this->addFlash('success', 'Evènement engristré');
            return $this->redirectToRoute('evenement_create');
        }


        return $this->render('evenement/create.html.twig', [
            'evenementForm' => $evenementForm->createView(),
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
