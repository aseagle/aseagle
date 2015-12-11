<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebPlatform\AseagleBundle\Entity\WishProduct;


class WishProductController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $wish_products = $user->getWishProducts();
        return $this->render('AseagleBundle:WishProduct:index.html.twig', array('wish_products' => $wish_products));
    }

    public function newAction(Request $request)
    {
        $wish_product = new WishProduct();
        $form = $this->createFormBuilder($wish_product)
            ->add('category', null,array('label' => 'Category:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('country',null , array('label' => 'Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('title', 'text', array('label' => 'Title:', 'attr' => array('class'=>'form-control input-md')))
            ->add('price', 'number', array('label' => 'Price:', 'attr' => array('class'=>'form-control input-md')))
            ->add('currency', 'text', array('label' => 'Currency:', 'attr' => array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $user = $this->getUser();
            $wish_product->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($wish_product);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Wish Product '.$wish_product->getTitle().' is created!');
            return $this->redirect($this->generateUrl('buyer_wish_product_index'));
        }else{
            return $this->render('AseagleBundle:WishProduct:new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function editAction($id, Request $request)
    {
        $wish_product = $this->getDoctrine()->getRepository('AseagleBundle:WishProduct')->find($id);
        $form = $this->createFormBuilder($wish_product)
            ->add('category', null,array('label' => 'Category:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('country',null , array('label' => 'Country:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('title', 'text', array('label' => 'Title:', 'attr' => array('class'=>'form-control input-md')))
            ->add('price', 'number', array('label' => 'Price:', 'attr' => array('class'=>'form-control input-md')))
            ->add('currency', 'text', array('label' => 'Currency:', 'attr' => array('class'=>'form-control input-md')))
            ->add('save', 'submit', array('label' => 'Save', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // save company_profile
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Wish Product '.$wish_product->getTitle().' is updated!');
            return $this->redirect($this->generateUrl('buyer_wish_product_index'));
        }else{
            return $this->render('AseagleBundle:WishProduct:edit.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }

    public function destroyAction($id)
    {
        $wish_product = $this->getDoctrine()->getRepository('AseagleBundle:WishProduct')->find($id);
        $title = $wish_product->getTitle();
        $em = $this->getDoctrine()->getManager();
        $em->remove($wish_product);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Wish Product '.$title.' is deleted!');
        return $this->redirect($this->generateUrl('buyer_wish_product_index'));
    }
}
