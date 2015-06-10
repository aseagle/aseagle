<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice;

class CompanyOverseaOfficeController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $company_oversea_offices = $user->getCompany()->getOverseaOffices();
        return $this->render('AseagleBundle:CompanyOverseaOffice:index.html.twig', array('oversea_offices' => $company_oversea_offices));
    }

    public function newAction(Request $request)
    {
        $company_oversea_office = new CompanyOverseaOffice();
        $form = $this->createFormBuilder($company_oversea_office)
            ->add('image', 'hidden', array('label' => 'Image:'))
            ->add('country',null , array('label' => 'Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('city', 'text', array('label' => 'City:', 'attr' => array('class'=>'form-control input-md')) )
            ->add('address', 'text', array('label' => 'Address:', 'attr' => array('class'=>'form-control input-md')))
            ->add('telephone', 'text', array('label' => 'Telephone:', 'attr' => array('class'=>'form-control input-md')))
            ->add('dutires', 'text', array('label' => 'Dutires:', 'attr' => array('class'=>'form-control input-md')))
            ->add('personInCharge', 'text', array('label' => 'Person In Charge:', 'attr' => array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $company = $this->getUser()->getCompany();
            $company_oversea_office->setCompany($company);
            $em = $this->getDoctrine()->getManager();
            $em->persist($company_oversea_office);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Award '.$company_oversea_office->getCountry()->getName().' is created!');
            return $this->redirect($this->generateUrl('seller_company_oversea_office_index',array('seller_id'=>$company->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyOverseaOffice:new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function editAction($id, Request $request)
    {
        $company_oversea_office = $this->getDoctrine()->getRepository('AseagleBundle:CompanyOverseaOffice')->find($id);
        $form = $this->createFormBuilder($company_oversea_office)
            ->add('image', 'hidden', array('label' => 'Image:'))
            ->add('country',null , array('label' => 'Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('city', 'text', array('label' => 'City:', 'attr' => array('class'=>'form-control input-md')) )
            ->add('address', 'text', array('label' => 'Address:', 'attr' => array('class'=>'form-control input-md')))
            ->add('telephone', 'text', array('label' => 'Telephone:', 'attr' => array('class'=>'form-control input-md')))
            ->add('dutires', 'text', array('label' => 'Dutires:', 'attr' => array('class'=>'form-control input-md')))
            ->add('personInCharge', 'text', array('label' => 'Person In Charge:', 'attr' => array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Award '.$company_oversea_office->getCountry()->getName().' is updated!');
            return $this->redirect($this->generateUrl('seller_company_oversea_office_index',array('seller_id'=>$company_oversea_office->getCompany()->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyOverseaOffice:new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function destroyAction($id)
    {
        $company_oversea_office = $this->getDoctrine()->getRepository('AseagleBundle:CompanyOverseaOffice')->find($id);
        $name = $company_oversea_office->getCountry()->getName();
        $em = $this->getDoctrine()->getManager();
        $em->remove($company_oversea_office);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Award '.$name.' is deleted!');
        return $this->redirect($this->generateUrl('seller_company_oversea_office_index',array('seller_id'=>$company_oversea_office->getCompany()->getId())));
    }

}
