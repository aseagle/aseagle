<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class StaticController extends Controller
{

    public function welcomeAction()
    {
        //get category
        $cats = $this->getDoctrine()->getRepository('AseagleBundle:Category')->findBy(array('parent_id' => '1'),null,null,null);

        //get 3 lastest product
        $products = $this->getDoctrine()->getRepository('AseagleBundle:Product')->findBy(array(),array('id' => 'DESC'),4,null);
        $banner_products_info = array();
        foreach($products as $product)
        {
            $image_helper = $this->get('image_helper');
            $root = "/aseagle/web/files/";
            array_push($banner_products_info, array(
                'id' => $product->getId(),
                'cat_id' => $product->getCategoryId(),
                'n' => $product->getTitle(),
                'bd' => $product->getBriefDescription(),
                'pl' => $product->getPlaceOfOrigin(),
                'img' => $image_helper->generate_one_large_image_url($product->getPicture(),$root),
                'pr' => $product->getPriceCurrency().$product->getPriceOrigin().'/'.$product->getPriceUnitType(),
                'm_o' => $product->getMinOrder().' '.$product->getMinOrderUnitType()
            ));
        }
        return $this->render('AseagleBundle:Static:portal.html.twig', array('cats' => $cats, 'banner_products' => $banner_products_info));
    }
}
