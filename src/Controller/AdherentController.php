<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Adherent;



class AdherentController extends AbstractController
{
    /**
     * @Route("/adherents", name="adherents")
     */
    public function adherents()
    {
        $repository = $this->getDoctrine()->getRepository(Adherent::class);
        $lesAdherents = $repository->findAll(); 

        return $this->render('adherent/adherents.html.twig', [
            'controller_name' => 'ControllerController',
            'lesAdherents' => $lesAdherents,
        ]);
    }

    /**
     * @Route("/adherents/{id}", name="adherentDetails")
     */
    public function adherent($id)
    {
         $repository = $this->getDoctrine()->getRepository(Adherent::class);
         $unAdherent = $repository->find($id);
         
         return $this->render('adherent/adherent{id}.html.twig', [
             'adherent' => $unAdherent,
             ]);
    }



    /**
     * TRAITEMENT SUR UN ADHERENT (+ mise à jour sur la bdd)
     * Inscription / Modifcation / Suppression
     */

    /**
     * @Route("/adherent/inscription", name="adherentInscription")
     */
    public function adherentInscription()
    {
        $entityManager = $this->getDoctrine()->getManager();

        return $this->render('adherent/adherentInscription.html.twig', [
            'entityManager'=> 'Coucou',
        ]);
    }

    /**
     * @Route("/adherent/modification/{id}", name="adherentModification")
     */
    public function adherentModification()
    {
        $entityManager = $this->getDoctrine()->getManager();

        return $this->render('adherent/adherentModification.html.twig', [
            'entityManager'=> var_dump($this->getDoctrine()->getManager()),
        ]);
    }

    /**
     * @Route("/adherent/suppression/{id}", name="adherentSuppression")
     */
    public function adherentSuppression()
    {
        $entityManager = $this->getDoctrine()->getManager();

        return $this->render('adherent/adherentSuppression.html.twig', [
            'entityManager'=> 'Coucou',
        ]);
    }
}
