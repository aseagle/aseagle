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
            ->add('year_cooperation', 'date', array('label' => 'Year Cooperation:'))
            ->add('total_transaction', 'integer', array('label' => 'Total Transaction:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('product_capacity', 'text', array('label' => 'Product Capacity:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $company_factory->setCompany($this->getUser()->getCompany());
            $em = $this->getDoctrine()->getManager();
            $em->persist($company_factory);
            $em->flush();

            return $this->redirect($this->generateUrl('seller_company_factory_index'));
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
            ->add('year_cooperation', 'date', array('label' => 'Year Cooperation:'))
            ->add('total_transaction', 'integer', array('label' => 'Total Transaction:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('product_capacity', 'text', array('label' => 'Product Capacity:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('seller_company_factory_index'));
        }else{
            return $this->render('AseagleBundle:CompanyFactory:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function destroyAction( $id)
    {
        $company_factory = $this->getDoctrine()->getRepository('AseagleBundle:CompanyFactory')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($company_factory);
        $em->flush();
        return $this->redirect($this->generateUrl('seller_company_factory_index'));
    }

}
