<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebPlatform\AseagleBundle\Entity\CompanyProfile;

class SellerController extends Controller
{
    public function newAction(Request $request)
    {
        $company_profile = new CompanyProfile();
        $form = $this->createFormBuilder($company_profile)
            ->add('name', 'text', array('label' => 'Company Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give a name')))
            ->add('reg_address', 'text', array('label' => 'Register Address:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('reg_year', 'collot_datetime', array('label' => 'Register Year:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('reg_country',null , array('label' => 'Register Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('total_employee', 'integer', array('label' => 'Total of Employee:', 'attr'=> array('class'=>'form-control input-md')) )
            ->add('ops_address', 'text', array('label' => 'Operation Address:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('ops_city', 'text', array('label' => 'Operation City:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('ops_country',null , array('label' => 'OPS Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('ops_zip', 'text', array('label' => 'Operation Zip:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('main_products', 'text', array('label' => 'Primary Productions:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('others_selling', 'text', array('label' => 'Others Selling:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('website', 'text', array('label' => 'Website:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('legal_owner', 'text', array('label' => 'Legal Owner:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('office_site', 'integer', array('label' => 'Office Site:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('total_sale_volumn', 'text', array('label' => 'Total Sale Volumn:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('export_percentage', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('main_markets_distribution', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('year_start_export', 'integer', array('attr'=> array('class'=>'form-control input-md')))
            ->add('total_trade_staff', 'integer', array('attr'=> array('class'=>'form-control input-md')))
            ->add('total_rnd_staff', 'integer', array('attr'=> array('class'=>'form-control input-md')))
            ->add('total_qc_staff', 'integer', array('attr'=> array('class'=>'form-control input-md')))
            ->add('nearest_port', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('average_lead_time', 'integer', array('attr'=> array('class'=>'form-control input-md')))
            ->add('deliver_term', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('currency', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('payment_type', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('language', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('company_advantage', 'textarea', array('attr'=> array('class'=>'form-control textarea-wysihtml5')))
            ->add('detail_introduction', 'textarea', array('attr'=> array('class'=>'form-control textarea-wysihtml5')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $em = $this->getDoctrine()->getManager();
            $company_profile->setIsVerified(false);
            $em->persist($company_profile);
            $em->flush();
            //get company_id and save seller
            $seller = $this->getUser();
            $seller->setCompany($company_profile);
            $seller->setIsSeller(true);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Company '.$company_profile->getName().' is created!');
            return $this->redirect($this->generateUrl('edit_seller',array("id" => $company_profile->getId())));
        }else{
            return $this->render('AseagleBundle:Seller:new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function editAction($id, Request $request)
    {
        $company_profile = $this->getDoctrine()->getRepository('AseagleBundle:CompanyProfile')->find($id);

        $form = $this->createFormBuilder($company_profile)
            ->add('name', 'text', array('label' => 'Company Name:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give a name')))
            ->add('reg_address', 'text', array('label' => 'Register Address:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('reg_year', 'collot_datetime', array('label' => 'Register Year:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->add('reg_country',null , array('label' => 'Register Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('total_employee', 'integer', array('label' => 'Total of Employee:', 'attr'=> array('class'=>'form-control input-md')) )
            ->add('ops_address', 'text', array('label' => 'Operation Address:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('ops_city', 'text', array('label' => 'Operation City:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('ops_country',null , array('label' => 'OPS Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('ops_zip', 'text', array('label' => 'Operation Zip:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('main_products', 'text', array('label' => 'Primary Productions:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('others_selling', 'text', array('label' => 'Others Selling:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('website', 'text', array('label' => 'Website:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('legal_owner', 'text', array('label' => 'Legal Owner:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('office_site', 'integer', array('label' => 'Office Site:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('total_sale_volumn', 'text', array('label' => 'Total Sale Volumn:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('export_percentage', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('main_markets_distribution', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('year_start_export', 'integer', array('attr'=> array('class'=>'form-control input-md')))
            ->add('total_trade_staff', 'integer', array('attr'=> array('class'=>'form-control input-md')))
            ->add('total_rnd_staff', 'integer', array('attr'=> array('class'=>'form-control input-md')))
            ->add('total_qc_staff', 'integer', array('attr'=> array('class'=>'form-control input-md')))
            ->add('nearest_port', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('average_lead_time', 'integer', array('attr'=> array('class'=>'form-control input-md')))
            ->add('deliver_term', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('currency', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('payment_type', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('language', 'text', array('attr'=> array('class'=>'form-control input-md')))
            ->add('company_advantage', 'textarea', array('attr'=> array('class'=>'form-control textarea-wysihtml5')))
            ->add('detail_introduction', 'textarea', array('attr'=> array('class'=>'form-control textarea-wysihtml5')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //$em->persist($company_profile);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Company '.$company_profile->getName().' is updated!');
            return $this->redirect($this->generateUrl('edit_seller',array("id" => $company_profile->getId())));
        }else{
            return $this->render('AseagleBundle:Seller:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function showAction($id, Request $request)
    {
        $company_profile = $this->getDoctrine()->getRepository('AseagleBundle:CompanyProfile')->find($id);


    }
}
