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
}