<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('usuario', TextType::class, array('label' => 'Usuario'))
                ->add('password', PasswordType::class, array('label' => 'Password'))
                ->add('submit', SubmitType::class, array('label' => 'Registrarse'));
    }
}
