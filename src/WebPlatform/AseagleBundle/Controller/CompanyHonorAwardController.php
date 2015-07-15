<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebPlatform\AseagleBundle\Entity\CompanyHonorAward;

class CompanyHonorAwardController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $company_honor_awards = $user->getCompany()->getCompanyHonorAwards();
        return $this->render('AseagleBundle:CompanyHonorAward:index.html.twig', array('awards' => $company_honor_awards));
    }

    public function newAction(Request $request)
    {
        $company_honor_award = new CompanyHonorAward();
        $form = $this->createFormBuilder($company_honor_award)
            ->add('image', 'hidden', array('label' => 'Image:'))
            ->add('name', 'text', array('label' => 'Award Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give factory a name')))
            ->add('issued_by', 'collot_datetime', array('label' => 'Issued By:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('start_date', 'collot_datetime', array('label' => 'Start Date:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('description', 'textarea', array('label' => 'Description:', 'attr'=> array('class'=>'form-control textarea-wysihtml5')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $company = $this->getUser()->getCompany();
            $company_honor_award->setCompany($company);
            $em = $this->getDoctrine()->getManager();
            $em->persist($company_honor_award);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Award '.$company_honor_award->getName().' is created!');
            return $this->redirect($this->generateUrl('seller_company_honor_award_index',array('seller_id'=>$company->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyHonorAward:new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function editAction($id, Request $request)
    {
        $company_honor_award = $this->getDoctrine()->getRepository('AseagleBundle:CompanyHonorAward')->find($id);
        $form = $this->createFormBuilder($company_honor_award)
            ->add('image', 'hidden', array('label' => 'Image:'))
            ->add('name', 'text', array('label' => 'Award Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give Award a name')))
            ->add('issued_by', 'collot_datetime', array('label' => 'Issued By:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('start_date', 'collot_datetime', array('label' => 'Start Date:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('description', 'textarea', array('label' => 'Description:', 'attr'=> array('class'=>'form-control textarea-wysihtml5')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Award '.$company_honor_award->getName().' is updated!');
            return $this->redirect($this->generateUrl('seller_company_honor_award_index',array('seller_id'=>$company_honor_award->getCompany()->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyHonorAward:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function destroyAction($id)
    {
        $company_honor_award = $this->getDoctrine()->getRepository('AseagleBundle:CompanyHonorAward')->find($id);
        $name =$company_honor_award->getName();
        $em = $this->getDoctrine()->getManager();
        $em->remove($company_honor_award);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Award '.$name.' is deleted!');
        return $this->redirect($this->generateUrl('seller_company_honor_award_index',array('seller_id'=>$company_honor_award->getCompany()->getId())));
    }

    public function show_allAction($seller_id)
    {
        $company_profile = $this->getDoctrine()->getRepository('AseagleBundle:CompanyProfile')->find($seller_id);
        $company_awards = $company_profile->getCompanyHonorAwards();
        return $this->render('AseagleBundle:CompanyHonorAward:show_all.html.twig', array('company_profile' => $company_profile, 'awards' => $company_awards));
    }
}
