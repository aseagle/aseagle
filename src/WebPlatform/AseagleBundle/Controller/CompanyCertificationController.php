<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebPlatform\AseagleBundle\Entity\CompanyCertification;

class CompanyCertificationController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $company_certifications = $user->getCompany()->getCompanyCertifications();
        return $this->render('AseagleBundle:CompanyCertification:index.html.twig', array('certifications' => $company_certifications));
    }

    public function newAction(Request $request)
    {
        $company_certification = new CompanyCertification();
        $form = $this->createFormBuilder($company_certification)
            ->add('image', 'hidden', array('label' => 'Image:'))
            ->add('name', 'text', array('label' => 'Certification Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give certification a name')))
            ->add('type', 'integer', array('label' => 'Type:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('issued_by', 'collot_datetime', array('label' => 'Issued By:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('start_date', 'collot_datetime', array('label' => 'Start Date:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('end_date', 'collot_datetime', array('label' => 'End Date:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('scope', 'text', array('label' => 'Scope:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $company = $this->getUser()->getCompany();
            $company_certification->setCompany($company);
            $em = $this->getDoctrine()->getManager();
            $em->persist($company_certification);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Award '.$company_certification->getName().' is created!');
            return $this->redirect($this->generateUrl('seller_company_certification_index',array('seller_id'=>$company->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyCertification:new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function editAction( $id, Request $request)
    {
        $company_certification = $this->getDoctrine()->getRepository('AseagleBundle:CompanyCertification')->find($id);
        $form = $this->createFormBuilder($company_certification)
            ->add('image', 'hidden', array('label' => 'Image:'))
            ->add('name', 'text', array('label' => 'Certification Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give certification a name')))
            ->add('type', 'integer', array('label' => 'Type:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('issued_by', 'collot_datetime', array('label' => 'Issued By:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('start_date', 'collot_datetime', array('label' => 'Start Date:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('end_date', 'collot_datetime', array('label' => 'End Date:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('scope', 'text', array('label' => 'Scope:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Certificate '.$company_certification->getName().' is updated!');
            return $this->redirect($this->generateUrl('seller_company_certification_index', array('seller_id'=>$company_certification->getCompany()->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyCertification:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function destroyAction( $id)
    {
        $company_certification = $this->getDoctrine()->getRepository('AseagleBundle:CompanyCertification')->find($id);
        $name = $company_certification->getName();
        $em = $this->getDoctrine()->getManager();
        $em->remove($company_certification);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Certificate '.$name.' is deleted!');
        return $this->redirect($this->generateUrl('seller_company_certification_index', array('seller_id'=>$company_certification->getCompany()->getId())));
    }

    public function show_allAction($seller_id)
    {
        $company_profile = $this->getDoctrine()->getRepository('AseagleBundle:CompanyProfile')->find($seller_id);
        $company_certifications = $company_profile->getCompanyCertifications();
        return $this->render('AseagleBundle:CompanyCertification:show_all.html.twig', array('company_profile' => $company_profile, 'certifications' => $company_certifications));
    }
}
