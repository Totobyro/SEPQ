<?php

namespace App\Controller;

use App\Entity\Joueur;
use App\Form\FiltreType;
use App\Form\JoueurType;
use App\Form\Model\Filtre;
use App\Repository\JoueurRepository;
use App\Repository\SaisonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class JoueurController extends AbstractController
{
    /**
     * @Route("/joueur", name="app_joueur_index")
     */
    public function index(Request $request, JoueurRepository $joueurRepository, SaisonRepository $saisonRepository): Response
    {
        $filtre = new Filtre();
        $formFiltre = $this->createForm(FiltreType::class, $filtre);
        $formFiltre->handleRequest($request);

        $joueurs = $joueurRepository->findByFiltersNom($formFiltre);

        $saisons = $saisonRepository->findBySaison();

        return $this->render('joueur/index.html.twig', [
            'j' => $joueurs,
            'filtre' => $formFiltre->createView(),
            's' => $saisons,
        ]);
    }

    /**
     * @Route("/new", name="app_joueur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SluggerInterface $slugger, JoueurRepository $joueurRepository): Response
    {
        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $joueurRepository->add($joueur);
        } elseif ($form->isSubmitted() && !$form->isValid()) {
        }


        return $this->renderForm('joueur/new.html.twig', [
            'form' => $form,
            'joueur' => $joueur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_joueur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EntityManagerInterface $em, Joueur $joueur): Response
    {
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            $this->addFlash(
                'successModif',
                'Le joueur a bien été modifié'
            );

            return $this->redirectToRoute('app_joueur_index', [], Response::HTTP_SEE_OTHER);
        } elseif ($form->isSubmitted() && !$form->isValid()) {

            $this->addFlash(
                'dangerModif',
                'Le joueur n\'a pas pu être modifié !'
            );
        }

        return $this->renderForm('joueur/edit.html.twig', [
            'joueur' => $joueur,
            'form' => $form,
        ]);
    }
}
