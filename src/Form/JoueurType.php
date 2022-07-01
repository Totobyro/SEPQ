<?php

namespace App\Form;

use App\Entity\Joueur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JoueurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('posteId', null, [
                'choice_label' => 'libelle',
                'multiple' => false, //menu select classic
            ])
            ->add('saisons', null, [
                'choice_label' => 'annee',
                'multiple' => true, //menu select classic
            ])
            // ->add('statId', null, [
            //     'choice_label' => 'nbButChamp',
            //     'multiple' => true, //menu select classic
            // ])
            // ->add('statId', null)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Joueur::class,
        ]);
    }
}
