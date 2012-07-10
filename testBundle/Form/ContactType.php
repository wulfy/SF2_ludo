<?php

namespace Ludo\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email');
		$builder->add('age', 'number');
		$builder->add('date', 'date');
        $builder->add('message', 'textarea');
    }

    public function getName()
    {
        return 'contact';
    }
}
