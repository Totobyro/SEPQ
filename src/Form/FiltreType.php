<?php

namespace App\Form;

use App\Entity\Saison;
use App\Form\Model\Filtre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiltreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('recherche')

            ->add('saison', EntityType::class, [
                'label' => 'Saison',
                'class' => Saison::class, 'choice_label' => 'annee',
                'placeholder' => 'Toutes les saisons', 'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Filtre::class,
        ]);
    }
}
