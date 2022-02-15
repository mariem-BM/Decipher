<?php

namespace App\Form;

use App\Entity\Planinng;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaninngType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_planning')
            ->add('dateDebut_planning')
            ->add('dateFin_planning')
            ->add('destination_planning')
            ->add('activites_planning')
            ->add('description_planning')
            ->add('periode_planning')
            ->add('prix_planning')
            ->add('localisation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Planinng::class,
        ]);
    }
}
