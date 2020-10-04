<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Categorie;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function categories()
    {
        $repository = $this->getDoctrine()->getRepository(Categorie::class);
        $lesCategories = $repository->findAll(); 

        return $this->render('categorie/categories.html.twig', [
            'lesCategories' => $lesCategories,
        ]);
    }
}
