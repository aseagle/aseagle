<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebPlatform\AseagleBundle\Entity\CompanyCustomer;

class CompanyCustomerController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $company_customers = $user->getCompany()->getCompanyCustomers();
        return $this->render('AseagleBundle:CompanyCustomer:index.html.twig', array('customers' => $company_customers));
    }

    public function newAction(Request $request)
    {
        $company_customer = new CompanyCustomer();
        $form = $this->createFormBuilder($company_customer)
            ->add('name', 'text', array('label' => 'Customer Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give a name')))
            ->add('country',null , array('label' => 'Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('products', 'text', array('label' => 'Products:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('annual_turnover', 'integer', array('label' => 'Annual Turnover:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $company_customer->setCompany($this->getUser()->getCompany());
            $em = $this->getDoctrine()->getManager();
            $em->persist($company_customer);
            $em->flush();

            return $this->redirect($this->generateUrl('seller_company_customer_index'));
        }else{
            return $this->render('AseagleBundle:CompanyCustomer:new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function editAction($id, Request $request)
    {
        $company_customer = $this->getDoctrine()->getRepository('AseagleBundle:CompanyCustomer')->find($id);
        $form = $this->createFormBuilder($company_customer)
            ->add('name', 'text', array('label' => 'Customer Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give a name')))
            ->add('country',null , array('label' => 'Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('products', 'text', array('label' => 'Products:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('annual_turnover', 'integer', array('label' => 'Annual Turnover:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('seller_company_customer_index'));
        }else{
            return $this->render('AseagleBundle:CompanyCustomer:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function destroyAction($id)
    {
        $company_customer = $this->getDoctrine()->getRepository('AseagleBundle:CompanyCustomer')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($company_customer);
        $em->flush();
        return $this->redirect($this->generateUrl('seller_company_customer_index'));
    }
}
