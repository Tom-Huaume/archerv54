<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Form\MembreType;
use App\Repository\MembreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends AbstractController
{
    #[Route('/admin/membre', name: 'membre_list')]
    public function list(
        Request $request,
        EntityManagerInterface $entityManager,
        MembreRepository $membreRepository
    ): Response
    {
        //liste des lieux
        $membres = $membreRepository->findAll();

        //générer le formulaire de création dans la vue
        $membre = new Membre();
        $membreForm = $this->createForm(MembreType::class, $membre);
        $membreForm->handleRequest($request);

        //traitement du formulaire
        if($membreForm->isSubmitted() && $membreForm->isValid()){

            $membre->setPassword('Pa$$w0rd');
            $membre->setStatutLicence(1);
            $entityManager->persist($membre);
            $entityManager->flush();

            $this->addFlash('success', 'Membre enregistré');
            return $this->redirectToRoute('membre_list');
        }

        return $this->render('membre/list.html.twig', [
            'membreForm' => $membreForm->createView(),
            'membres' => $membres,
        ]);
    }

    #[Route('/admin/membre/delete/{id}', name:'membre_delete')]
    public function delete(
        Membre $membre,
        EntityManagerInterface $entityManager
    ): Response
    {
        $entityManager->remove($membre);
        $entityManager->flush();

        $this->addFlash('danger', 'Membre supprimé');
        return $this->redirectToRoute('membre_list');
    }
}
