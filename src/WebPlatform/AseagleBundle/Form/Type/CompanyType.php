<?php
/**
 * Created by PhpStorm.
 * User: HiepLuong
 * Date: 12/11/15
 * Time: 6:01 PM
 */

namespace WebPlatform\AseagleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use WebPlatform\AseagleBundle\Entity\CompanyProfile;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('label' => 'Company Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give a name')));
        $builder->add('reg_address', 'text', array('label' => 'Registered Address:', 'attr'=> array('class'=>'form-control input-md')));
        $builder->add('ops_address', 'text', array('label' => 'Operating Address:', 'required' => false, 'attr'=> array('class'=>'form-control input-md')));
        $builder->add('registration_number', 'text', array('label' => 'Registration No:', 'attr'=> array('class'=>'form-control input-md')));
        $builder->add('main_products', 'text', array('label' => 'Key Products/Services:', 'required' => false, 'attr'=> array('class'=>'form-control input-md')));
        $builder->add('type', 'choice', array('choices' => array('0' => 'Private', '1' => 'Public'),'label' => 'Type:', 'attr'=> array('class'=>'form-control input-md')));
        $builder->add('legal_owner', 'text', array('label' => 'Full name of Company Founder:', 'required' => false, 'attr'=> array('class'=>'form-control input-md')));
        $builder->add('ceo_name', 'text', array('label' => 'Full name of Company CEO:', 'required' => false, 'attr'=> array('class'=>'form-control input-md')));
        $builder->add('shareholders', 'text', array('label' => 'Name of Top 3 shareholders:', 'required' => false, 'attr'=> array('class'=>'form-control input-md')));
        $builder->add('picture', 'hidden', array('required' => false, 'label' => 'Pictures:'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebPlatform\AseagleBundle\Entity\CompanyProfile'
        ));
    }

    public function getName()
    {
        return 'company_profile';
    }
}