<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Club;

class ClubController extends AbstractController
{
    /**
     * @Route("/clubs", name="clubs")
     */
    public function clubs()
    {
        $repository = $this->getDoctrine()->getRepository(Club::class);
        $lesClubs = $repository->findAll(); 

        return $this->render('club/clubs.html.twig', [
            'lesClubs' => $lesClubs,
        ]);
    }
}
