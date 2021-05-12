<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VehiculoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descripcion', TextType::class, array('label' => 'Marca - Modelo'))
                ->add('precio', TextType::class, array('label' => 'Precio'))
                ->add('submit', SubmitType::class, array('label' => 'Registrar Vehiculo'));
    }
}
