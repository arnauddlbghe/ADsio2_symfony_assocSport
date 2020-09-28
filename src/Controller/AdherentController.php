<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Adherent;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

use Symfony\Component\HttpFoundation\Request;

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
    public function adherentInscription(Request $request)
    {
        $adherent= new Adherent();
        $form = $this->createFormBuilder($adherent)
                    ->add('nom',TextType::class, array('label'=>'Nom: '))
                    ->add('date',BirthdayType::class, array('label'=>'Date de naissance: '))
                    ->add('save', SubmitType::class, array('label'=>'Enregistrer'))
                    ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $adherent = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adherent);
            $entityManager->flush();

            //Redirection vers la liste des adhérents
            return $this->redirectToRoute('adherents');
        }

        return $this->render('adherent/adherentInscription.html.twig', [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/adherent/modification/{id}", name="adherentModification")
     */
    public function adherentModification(int $id, Request $request)
    {
        $unAdherent = $this->getDoctrine()->getRepository(Adherent::class)->find($id);

        $form = $this->createFormBuilder($unAdherent)
                    ->add('nom',TextType::class, array('label'=>'Nom: '))
                    ->add('date',BirthdayType::class, array('label'=>'Date de naissance: '))
                    ->add('save', SubmitType::class, array('label'=>'Enregistrer'))
                    ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $adherent = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adherent);
            $entityManager->flush();

            //Redirection vers la liste des adhérents
            return $this->redirectToRoute('adherents');
        }

        return $this->render('adherent/adherentModification{id}.html.twig', [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/adherent/suppression/{id}", name="adherentSuppression")
     */
    public function adherentSuppression(int $id, Request $request)
    {
        $unAdherent = $this->getDoctrine()->getRepository(Adherent::class)->find($id);
        if ($unAdherent != null) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($unAdherent);
            $entityManager->flush();
            
        }
        return $this->redirectToRoute('adherents');
    }
}
