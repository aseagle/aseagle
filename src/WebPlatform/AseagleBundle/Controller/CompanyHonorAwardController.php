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
            ->add('name', 'text', array('label' => 'Award Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give factory a name')))
            ->add('issued_by', 'collot_datetime', array('label' => 'Issued By:', 'attr'=> array('class'=>'form-control input-md'),'pickerOptions' =>
                array('format' => 'mm/dd/yyyy', 'autoclose' => true, 'startView' => 'month', 'minView' => 'month', 'todayBtn' => true, 'todayHighlight' => true,)))
            ->add('start_date', 'collot_datetime', array('label' => 'Start Date:', 'attr'=> array('class'=>'form-control input-md'),'pickerOptions' =>
                array('format' => 'mm/dd/yyyy', 'autoclose' => true, 'startView' => 'month', 'minView' => 'month', 'todayBtn' => true, 'todayHighlight' => true,)))
            ->add('description', 'textarea', array('label' => 'Description:', 'attr'=> array('class'=>'form-control textarea-wysihtml5')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $company_honor_award->setCompany($this->getUser()->getCompany());
            $em = $this->getDoctrine()->getManager();
            $em->persist($company_honor_award);
            $em->flush();

            return $this->redirect($this->generateUrl('seller_company_honor_award_index'));
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
            ->add('name', 'text', array('label' => 'Award Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give Award a name')))
            ->add('issued_by', 'date', array('label' => 'Issued By:'))
            ->add('start_date', 'date', array('label' => 'Start Date:'))
            ->add('description', 'textarea', array('label' => 'Description:', 'attr'=> array('class'=>'form-control')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirect($this->generateUrl('seller_company_honor_award_index'));
        }else{
            return $this->render('AseagleBundle:CompanyHonorAward:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function destroyAction($id)
    {
        $company_honor_award = $this->getDoctrine()->getRepository('AseagleBundle:CompanyHonorAward')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($company_honor_award);
        $em->flush();
        return $this->redirect($this->generateUrl('seller_company_honor_award_index'));
    }

}
