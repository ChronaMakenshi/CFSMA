<?php

namespace App\Form;

use App\Entity\Roles;
use App\Entity\Users;
use App\Entity\Classes;
use App\Entity\Filieres;
use App\Entity\Sections;
use Symfony\Component\Form\FormEvent;
use App\Repository\SectionsRepository;
use Doctrine\ORM\Mapping\Entity;
use Proxies\__CG__\App\Entity\Users as EntityUsers;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'type' => PasswordType::class,
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'first_options'  => ['label' => 'Mot de passe :'],
                'second_options' => ['label' => 'Confirmer :'],
                'invalid_message' => 'Les champs du mot de passe doivent correspondre.',
                'options' => ['attr' => ['class' => 'password-field']],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe devrait être au moins entrer un mot de passe {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 12,
                    ]),
                ],
            ])
            ->add('roles', CollectionType::class, [
                'entry_type' => ChoiceType::class,
                'entry_options' => [
                    'label' => false,
                    'allow_extra_fields' => true,
                    'choices' => [
                        'SuperAdmin' => 'ROLE_SUPERADMIN',
                        'Administrateur' => 'ROLE_ADMIN',
                        'Chef de Section' => 'ROLE_CHEF', 
                    ],
                ],
            ])
            ->add('section', EntityType::class, [
                'class' => Sections::class,
                'choice_label' => fn(Sections $sect) => $sect->getCompagnie()->getName() . '-' . $sect->getName(),
                'choice_value' => 'id',
                'query_builder' => fn(SectionsRepository $sectionRepo) =>  $sectionRepo->createQueryBuilder('s')->orderBy('s.name', 'ASC'),
                'label' => false,
              ])

              ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}

