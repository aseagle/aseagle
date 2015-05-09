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
            ->add('name', 'text', array('label' => 'Certification Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give certification a name')))
            ->add('type', 'integer', array('label' => 'Type:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('issued_by', 'date', array('label' => 'Issued By:'))
            ->add('start_date', 'date', array('label' => 'Start Date:'))
            ->add('end_date', 'date', array('label' => 'End Date:'))
            ->add('scope', 'text', array('label' => 'Scope:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $company_certification->setCompany($this->getUser()->getCompany());
            $em = $this->getDoctrine()->getManager();
            $em->persist($company_certification);
            $em->flush();

            return $this->redirect($this->generateUrl('seller_company_certification_index'));
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
            ->add('name', 'text', array('label' => 'Certification Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give certification a name')))
            ->add('type', 'integer', array('label' => 'Type:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('issued_by', 'date', array('label' => 'Issued By:'))
            ->add('start_date', 'date', array('label' => 'Start Date:'))
            ->add('end_date', 'date', array('label' => 'End Date:'))
            ->add('scope', 'text', array('label' => 'Scope:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('seller_company_certification_index'));
        }else{
            return $this->render('AseagleBundle:CompanyCertification:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function destroyAction( $id)
    {
        $company_certification = $this->getDoctrine()->getRepository('AseagleBundle:CompanyCertification')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($company_certification);
        $em->flush();
        return $this->redirect($this->generateUrl('seller_company_certification_index'));
    }

}
