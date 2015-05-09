<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    public function get_list_product_searchAction(Request $request)
    {
        $mapping_helper = $this->get('mapping_helper');
        $category_id = $request->request->get('category_id');
        $search_string = $request->request->get('search_string');
        $sort_by = $request->request->get('sort_by');
        $products = $this->getDoctrine()->getRepository('AseagleBundle:Product')->createQueryBuilder('p')
            ->where('p.category_id = :category_id')
            ->andWhere('p.title LIKE :search_string')
            ->setParameter('category_id', $category_id)
            ->setParameter('search_string', '%'.$search_string.'%')
            ->getQuery()
            ->getResult();

        $mapped_products_info = array();
        foreach($products as $product)
        {
            array_push($mapped_products_info, array(
                'id' => $product->getId(),
                'n' => $product->getTitle(),
                'pr' => $product->getPrice(),
                'm-o' => $product->getMinOrderQuantity(),
                'port' => $product->getPort(),
                'pay' => $product->getPaymentTerms(),
                'd' => $mapping_helper->mapping_products_in_category($product)
            ));
        }

        return new Response(json_encode($mapped_products_info),200,array('Content-Type'=>'application/json'));
    }

}
