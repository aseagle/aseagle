<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebPlatform\AseagleBundle\Entity\CompanyVerifying;
use WebPlatform\AseagleBundle\Form\Type\CompanyType;
use WebPlatform\AseagleBundle\Entity\CompanyProfile;

class VerifyingRequestController extends Controller
{
    public function indexAction()
    {

    }

    public function newAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        // Edit some company field
        $company_profile = $this->getDoctrine()->getRepository('AseagleBundle:CompanyProfile')->find($id);

        $verifying_request = new CompanyVerifying();
        $verifying_request->setCompany($company_profile);
        $ver_form = $this->createFormBuilder($verifying_request)
            ->add('company', new CompanyType())
            ->add('contact_person', 'text', array('label' => 'Name of Contact Person:', 'attr' => array('class'=>'form-control input-md')))
            ->add('contact_email', 'text', array('label' => 'Email of Contact:', 'attr' => array('class'=>'form-control input-md')))
            ->add('contact_phone', 'text', array('label' => 'Phone of Contact:', 'attr' => array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $ver_form->handleRequest($request);
        if ($ver_form->isValid()) {
            // save company_profile

            $em->persist($verifying_request);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Verifying Request is created!');
            return $this->redirect($this->generateUrl('welcome'));
        }else{
            return $this->render('AseagleBundle:VerifyingRequest:new.html.twig', array(
                'ver_form' => $ver_form->createView()
            ));
        }
    }

}
