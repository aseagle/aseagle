<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class StaticController extends Controller
{

    public function welcomeAction()
    {
        $products = $this->getDoctrine()->getRepository('AseagleBundle:Product')->findAll();

        $mapped_products_info = array();
        foreach($products as $product)
        {
            $image_helper = $this->get('image_helper');
            $root = "http://localhost:8000/files/";
            array_push($mapped_products_info, array(
                'id' => $product->getId(),
                'cat_id' => $product->getCategoryId(),
                'n' => $product->getTitle(),
                'pl' => $product->getPlaceOfOrigin(),
                'img' => $image_helper->generate_thumb_image_url($product->getPicture(),$root),
                'pr' => $product->getPriceCurrency().$product->getPriceOrigin().'/'.$product->getPriceUnitType(),
                'm_o' => $product->getMinOrder().' '.$product->getMinOrderUnitType()
            ));
        }
        return $this->render('AseagleBundle:Static:portal.html.twig', array('products' => $mapped_products_info));
    }

}
