<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebPlatform\AseagleBundle\Entity\CompanyTrademark;

class CompanyTrademarkController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $company_trademarks = $user->getCompany()->getCompanyTrademarks();
        return $this->render('AseagleBundle:CompanyTrademark:index.html.twig', array('trademarks' => $company_trademarks));
    }

    public function newAction(Request $request)
    {
        $company_trademark = new CompanyTrademark();
        $form = $this->createFormBuilder($company_trademark)
            ->add('name', 'text', array('label' => 'Certification Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give a name')))
            ->add('registration_number', 'text', array('label' => 'Registration Number:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('start_date', 'collot_datetime', array('label' => 'Start Date:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('end_date', 'collot_datetime', array('label' => 'End Date:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('approved_goods', 'text', array('label' => 'Approved Goods:', 'attr'=> array('class'=>'form-control input-md')) )
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $company = $this->getUser()->getCompany();
            $company_trademark->setCompany($company);
            $em = $this->getDoctrine()->getManager();
            $em->persist($company_trademark);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Trademake '.$company_trademark->getName().' is created!');
            return $this->redirect($this->generateUrl('seller_company_trademark_index',array('seller_id'=>$company->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyTrademark:new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function editAction($id, Request $request)
    {
        $company_trademark = $this->getDoctrine()->getRepository('AseagleBundle:CompanyTrademark')->find($id);
        $form = $this->createFormBuilder($company_trademark)
            ->add('name', 'text', array('label' => 'Certification Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give a name')))
            ->add('registration_number', 'text', array('label' => 'Registration Number:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('start_date', 'collot_datetime', array('label' => 'Start Date:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('end_date', 'collot_datetime', array('label' => 'End Date:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('approved_goods', 'text', array('label' => 'Approved Goods:', 'attr'=> array('class'=>'form-control input-md')) )
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Trademake '.$company_trademark->getName().' is updated!');
            return $this->redirect($this->generateUrl('seller_company_trademark_index',array('seller_id'=>$company_trademark->getCompany()->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyTrademark:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function destroyAction($id)
    {
        $company_trademark = $this->getDoctrine()->getRepository('AseagleBundle:CompanyTrademark')->find($id);
        $name = $company_trademark->getName();
        $em = $this->getDoctrine()->getManager();
        $em->remove($company_trademark);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Trademake '.$name.' is deleted!');
        return $this->redirect($this->generateUrl('seller_company_trademark_index',array('seller_id'=>$company_trademark->getCompany()->getId())));
    }

    public function show_allAction($seller_id)
    {
        $company_profile = $this->getDoctrine()->getRepository('AseagleBundle:CompanyProfile')->find($seller_id);
        $company_trademarks = $company_profile->getCompanyTrademarks();
        return $this->render('AseagleBundle:CompanyTrademark:show_all.html.twig', array('company_profile' => $company_profile, 'trademarks' => $company_trademarks));
    }
}
