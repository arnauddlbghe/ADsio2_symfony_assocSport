<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

// Pour les formulaires :
/* Déjà déclaré mais utile aussi ici : use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;*/
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class ControllerController extends AbstractController
{
    /***** DECLARATIONS ROUTES *****/

    /*
     * @Route("/controller", name="controller")
     */
    public function controller()
    {
        return $this->render('controller/controller.html.twig', [
            'controller_name' => 'ControllerController',
        ]);
    }

    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('controller/index.html.twig', [
            'controller_name' => 'ControllerController',
        ]);
    }

    /**
     * @Route("/categories", name="categories")
     */
    public function categories()
    {
        return $this->render('controller/categories.html.twig', [
            'controller_name' => 'ControllerController',
        ]);
    }

    /**
     * @Route("/entrainements", name="entrainements")
     */
    public function entrainements()
    {
        return $this->render('controller/entrainements.html.twig', [
            'controller_name' => 'ControllerController',
        ]);
    }

    /**
     * @Route("/competitions", name="competitions")
     */
    public function competitions()
    {
        return $this->render('controller/competitions.html.twig', [
            'controller_name' => 'ControllerController',
        ]);
    }

    /**
     * @Route("/adherent/{id}", name="adherent")
     */
    public function adherent($id)
    {
         $repository = $this->getDoctrine()->getRepository(Adherent::class);
         $unAdherent = $repository->find($id);
         
         return $this->render('controller/adherent.html.twig', [
             'adherent' => $unAdherent,
             ]);
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $adherent = new Adherent();
        $form = $this->createFormBuilder($adherent)
                    ->add('nom', TextType::class, array('label'=>'Nom de l\'adhérent :'))
                    ->add('date', DateType::class, array('label'=>'Date de naissance de l\'adhérent :'))
                    ->add('save', SubmitType::class, array('label'=>'Enregistrer l\'adhérent'))
                    ->getForm()
                    ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adherent = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($adherent);
            $em->flush();
            return $this->redirectToRoute('adherents');
        }


        return $this->render('controller/inscription.html.twig', [
            'form'=> $form->createView(),
        ]);
    }

    /**
     * @Route("/modifierAdherent/{id}", name="modifierAdherent")
     */
    public function modifierAdherent(Request $request, $id)
    {

        $repository = $this->getDoctrine()->getRepository(Adherent::class);
        $unAdherent = $repository->find($id);
        
        return $this->render('controller/modifierAdherent.html.twig', [
            'adherent' => $unAdherent,
            ]);

        /*$em = $this->getDoctrine()->getManager();
        $adherent = $entityManager->getRepository(Adherent::class)->find($id);
        $form = $this->createFormBuilder($adherent)
                    ->set('nom', TextType::class, array('label'=>'Nouveau nom de l\'adhérent :'))
                    ->set('date', DateType::class, array('label'=>'Nouvelle date de naissance de l\'adhérent :'))
                    ->set('save', SubmitType::class, array('label'=>'Nouvel enregistrement l\'adhérent'))
                    ->getForm()
                    ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adherent = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($adherent);
            $em->flush();
            return $this->redirectToRoute('adherents');
        }


        return $this->render('controller/inscription.html.twig', [
            'form'=> $form->createView(),
        ]);*/
    }

            /***** AUTRES METHODES *****/
}
