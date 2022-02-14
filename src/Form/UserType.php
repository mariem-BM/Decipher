<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_utilisateur')
            ->add('prenom_utilisateur')
            ->add('adresse_utilisateur')
            ->add('mail_utilisateur')
            ->add('sudo_utilisateur')
            ->add('mdp_utilisateur')
            ->add('Etat_Compte')
            ->add('Numero_utilisateur')
            ->add('DateN_utilisateur')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
