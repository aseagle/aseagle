<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebPlatform\AseagleBundle\Entity\CompanyPatent;

class CompanyPatentController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $company_patents = $user->getCompany()->getCompanyPatents();
        return $this->render('AseagleBundle:CompanyPatent:index.html.twig', array('patents' => $company_patents));
    }

    public function newAction(Request $request)
    {
        $company_patent = new CompanyPatent();
        $form = $this->createFormBuilder($company_patent)
            ->add('image', 'hidden', array('label' => 'Image:'))
            ->add('name', 'text', array('label' => 'Patent Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give a name')))
            ->add('country',null , array('label' => 'Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('products', 'text', array('label' => 'Product:', 'attr' => array('class'=>'form-control input-md')) )
            ->add('annual_turnover', 'integer', array('label' => 'Annual Turnover:', 'attr' => array('class'=>'form-control input-md')) )
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $company = $this->getUser()->getCompany();
            $company_patent->setCompany($company);
            $em = $this->getDoctrine()->getManager();
            $em->persist($company_patent);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Patent '.$company_patent->getName().' is created!');
            return $this->redirect($this->generateUrl('seller_company_patent_index',array('seller_id'=>$company->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyPatent:new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function editAction($id, Request $request)
    {
        $company_patent = $this->getDoctrine()->getRepository('AseagleBundle:CompanyPatent')->find($id);
        $form = $this->createFormBuilder($company_patent)
            ->add('image', 'hidden', array('label' => 'Image:'))
            ->add('name', 'text', array('label' => 'Patent Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give a name')))
            ->add('country',null , array('label' => 'Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('products', 'text', array('label' => 'Product:', 'attr' => array('class'=>'form-control input-md')) )
            ->add('annual_turnover', 'integer', array('label' => 'Annual Turnover:', 'attr' => array('class'=>'form-control input-md')) )
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Patent '.$company_patent->getName().' is updated!');
            return $this->redirect($this->generateUrl('seller_company_patent_index',array('seller_id'=>$company_patent->getCompany()->getId())));
        }else{
            return $this->render('AseagleBundle:CompanyPatent:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function destroyAction($id)
    {
        $company_patent = $this->getDoctrine()->getRepository('AseagleBundle:CompanyPatent')->find($id);
        $name = $company_patent->getName();
        $em = $this->getDoctrine()->getManager();
        $em->remove($company_patent);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Patent '.$name.' is deleted!');
        return $this->redirect($this->generateUrl('seller_company_patent_index',array('seller_id'=>$company_patent->getCompany()->getId())));
    }

}
