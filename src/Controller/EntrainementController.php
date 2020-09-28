<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EntrainementController extends AbstractController
{
    /**
     * @Route("/entrainement", name="entrainement")
     */
    public function index()
    {
        return $this->render('entrainement/index.html.twig', [
            'controller_name' => 'EntrainementController',
        ]);
    }
}
