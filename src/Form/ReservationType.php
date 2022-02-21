<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Billet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_reservation')
            ->add('user')
                    ->add('billet',EntityType::class,[
                        'class' => Billet::class,
                        'choice_label' => 'id',
                         'label' => 'Billet']
                         )
                  
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
