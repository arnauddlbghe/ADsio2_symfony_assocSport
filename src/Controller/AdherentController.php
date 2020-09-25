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
        // Traitement 
        $repository = $this->getDoctrine()->getRepository(Adherent::class);
        $lesAdherents = $repository->findAll();
        
        /* CREATION D'UN ADHERENT
        $unAdherent = new Adherent();
        $unAdherent->setNom("Gertrude");
        $unAdherent->setDate(new \DateTime("10/10/2000"));
        $em = $this->getDoctrine()->getManager();
        $em->persist($unAdherent);
        $em->flush();
        */
        
        /* MODIFICATION D'UN ADHERENT 
        $unAdherent = $repository->find(2);
        $unAdherent->setNom("Jean");
        $em = $this->getDoctrine()->getManager();
        $em->persist($unAdherent); // Non obligatoire car fait déjà partie des entités à persister
        $em->flush();
        */

        /* SUPPRESION D'UN ADHERENT 
        $unAdherent = $repository->find(1);
        $em = $this->getDoctrine()->getManager();
        $em->remove($unAdherent);
        $em->flush();
        */


        // Renvoi en view
        return $this->render('controller/adherents.html.twig', [
            'controller_name' => 'ControllerController',
            'lesAdherents' => $lesAdherents,
        ]);
    }
}
