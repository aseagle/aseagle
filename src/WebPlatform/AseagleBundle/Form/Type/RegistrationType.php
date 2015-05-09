<?php
/**
 * Created by PhpStorm.
 * User: HiepLuong
 * Date: 8/2/14
 * Time: 12:28 PM
 */

namespace WebPlatform\AseagleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('user', new UserType());
        $builder->add(
            'terms',
            'checkbox',
            array('property_path' => 'termsAccepted')
        );
        $builder->add('Register', 'submit');
    }

    public function getName()
    {
        return 'registration';
    }
}