<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebPlatform\AseagleBundle\Entity\CompanyFactory;

class CompanyFactoryController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $company_factories = $user->getCompany()->getCompanyFactories();
        return $this->render('AseagleBundle:CompanyFactory:index.html.twig', array('factories' => $company_factories));
    }

    public function newAction(Request $request)
    {
        $company_factory = new CompanyFactory();
        $form = $this->createFormBuilder($company_factory)
            ->add('name', 'text', array('label' => 'Factory Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give factory a name')))
            ->add('country',null , array('label' => 'Country:', 'attr'=> array('class'=>'form-control input-md')))
            //->add('year_cooperation', 'text', array('label' => 'Year Cooperation:'))
            ->add('year_cooperation', 'collot_datetime', array('label' => 'Year Cooperation:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('total_transaction', 'integer', array('label' => 'Total Transaction:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('product_capacity', 'text', array('label' => 'Product Capacity:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('picture', 'hidden', array('label' => 'Pictures:'))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $company = $this->getUser()->getCompany();
            $company_factory->setCompany($company);
            $em = $this->getDoctrine()->getManager();
            $em->persist($company_factory);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Factory '.$company_factory->getName().' is created!');
            return $this->redirect($this->generateUrl('seller_company_factory_index',array('seller_id'=>$company->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyFactory:new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function editAction($id, Request $request)
    {
        $company_factory = $this->getDoctrine()->getRepository('AseagleBundle:CompanyFactory')->find($id);
        $form = $this->createFormBuilder($company_factory)
            ->add('name', 'text', array('label' => 'Factory Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give factory a name')))
            ->add('country',null , array('label' => 'Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('year_cooperation', 'collot_datetime', array('label' => 'Year Cooperation:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('total_transaction', 'integer', array('label' => 'Total Transaction:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('product_capacity', 'text', array('label' => 'Product Capacity:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('picture', 'hidden', array('label' => 'Pictures:'))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Factory '.$company_factory->getName().' is updated!');
            return $this->redirect($this->generateUrl('seller_company_factory_index',array('seller_id'=>$company_factory->getCompany()->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyFactory:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function destroyAction( $id)
    {
        $company_factory = $this->getDoctrine()->getRepository('AseagleBundle:CompanyFactory')->find($id);
        $name = $company_factory->getName();
        $em = $this->getDoctrine()->getManager();
        $em->remove($company_factory);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Factory '.$name.' is deleted!');
        return $this->redirect($this->generateUrl('seller_company_factory_index',array('seller_id'=>$company_factory->getCompany()->getId())));
    }

    public function show_allAction($seller_id)
    {
        $company_profile = $this->getDoctrine()->getRepository('AseagleBundle:CompanyProfile')->find($seller_id);
        $company_factories = $company_profile->getCompanyFactories();
        return $this->render('AseagleBundle:CompanyFactory:show_all.html.twig', array('company_profile' => $company_profile, 'factories' => $company_factories));
    }
}
