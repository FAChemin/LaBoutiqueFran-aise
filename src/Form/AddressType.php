<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('name', TextType::class, [
                'label' => 'Quel nom souhaitez-vous donner à votre adresse ? ',
                'attr' => [
                    'placeholder' => 'Nommez votre adresse'
                ]
            ])

            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'attr' => [
                    'placeholder' => 'Saisissez votre prénom'
                ]
            ])

            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'placeholder' => 'Entrez votre nom'
                ]
            ])

            ->add('company', TextType::class, [
                'label' => 'Le nom de votre société',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Entrez le nom de votre société (facultatif) '
                ]
            ])

            ->add('address', TextType::class, [
                'label' => 'Votre adresse postale',
                'attr' => [
                    'placeholder' => 'Entrez votre adresse postale'
                ]
            ])

            ->add('postal', TextType::class, [
                'label' => 'Votre code postal ',
                'attr' => [
                    'placeholder' => 'Entrez votre code postal'
                ]
            ])

            ->add('city', TextType::class, [
                'label' => 'Votre ville',
                'attr' => [
                    'placeholder' => 'Entrez le nom de votre ville'
                ]
            ])

            ->add('country', CountryType::class, [
                'label' => 'Votre pays',
                'attr' => [
                    'placeholder' => 'Entrez votre pays'
                ]
            ])

            ->add('phone', TelType::class, [
                'label' => 'Votre numéro de téléphone',
                'attr' => [
                    'placeholder' => 'Entrez votre numéro de téléphone'
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => "Valider",
                'attr' => [
                    'class' => 'btn btn-success  mt-4 w-100'
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
