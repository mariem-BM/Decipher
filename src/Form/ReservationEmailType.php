<?php

namespace App\Form;
use App\Entity\Reservation;
use App\Entity\Billet;
use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
 use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ReservationEmailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
        
               ->add('user',EntityType::class,[
                'class' => User::class,
                'choice_label' => 'mail_utilisateur',
                 'label' => 'user']
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
