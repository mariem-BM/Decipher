<?php

namespace App\Form;

use App\Entity\Offre;
use App\Entity\Planinng;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_offre', TextType::class)

            ->add('description_offre', TextareaType::class)
            ->add('prix_offre')
            ->add('duree_offre')
            ->add('reduction')
            ->add('planning', EntityType::class, [
                'class' => Planinng::class,
                'choice_label' => 'nom_planning',
            ])
            ->add('date_debut_offre',DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
