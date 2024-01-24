<?php

namespace App\Form;

use App\Entity\User;
use PharIo\Manifest\Email;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('email', EmailType::class,[
                'label' => 'Email',
                'constraints' => new Length([
                    'min' => 5,
                    'max' => 60
            ]),
                'attr' => [
                'placeholder' => 'Entrez votre email']
            ])

            ->add('password', RepeatedType::class,[
                'type' => PasswordType::class,
                'label' => 'Mot de passe',
                'required' => 'Ce champ est obligatoire',
                'invalid_message' => 'Les messages doivent être identiques',


                'first_options' => [
                    'label' => 'Mot de passe',
                    'constraints' => new Length([
                        'min' => 5,
                        'max' => 60
                    ]),
                    'attr' => [
                        'placeholder' => 'Saisissez votre mot de passe'
                    ]
                ],


                'second_options' => [
                    'label' => 'Confirmation',
                    'attr' => [
                        'placeholder' => 'Confirmez votre mot de passe'
                    ]
                    ]
                
                ])

            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Saisissez votre nom']
                ])

            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Entrez votre prénom']
            ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}