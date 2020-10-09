<?php

namespace App\Form;

use App\Entity\Adherent;
use App\Entity\Categorie;
use App\Entity\Ville;
use App\Entity\Club;
use App\Entity\Competition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, array('label'=>'Nom: '))
            ->add('date',BirthdayType::class, array('label'=>'Date de naissance: '))
            ->add('categorie',EntityType::class, array(
                'class'=>Categorie::class,                      // Nom de la classe
                'choice_label'=>'libelle')                      // Attribut à afficher
                )
            ->add('ville',EntityType::class, array(
                'class'=>Ville::class,                          // Nom de la classe
                'choice_label'=>'libelle')                      // Attribut à afficher
                )
            ->add('club',EntityType::class, array(
                'class'=>Club::class,                           // Nom de la classe
                'choice_label'=>'nom')                          // Attribut à afficher
                )
            ->add('competition',EntityType::class, array(
                'class'=>Competition::class,                           // Nom de la classe
                'choice_label'=>'name',                          // Attribut à afficher
                    'multiple'=>true,
                    'expanded'=>true)
                )
            ->add('save', SubmitType::class, array('label'=>'Enregistrer'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adherent::class,
        ]);
    }
}
