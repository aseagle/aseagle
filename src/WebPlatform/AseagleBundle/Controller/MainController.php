<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;



class MainController extends Controller
{
    public function indexAction(Request $request)
    {
        //$cat_list = $this->getDoctrine()->getRepository('AseagleBundle:Category')->findBy(array(), array('lft' => 'ASC'));
        //$parents = $this->getDoctrine()->getRepository('AseagleBundle:Category')->findBy(array('parentId' => null), array('id' => 'ASC'));
        //self::get_cat_tree($parents, $cat_tree);
        return $this->render('AseagleBundle:Main:index.html.twig', array('cat_id' => $request->get('category_id')));
    }

    public function left_side_barAction(Request $request)
    {
        $category_id = $request->get('category_id');
        $cat_list = self::get_cat_lr_tree($category_id);
        $country_list = self::get_country($category_id);
        $filter_list =self::get_filter($category_id);
        $left_side_bar = array('current_cat_id' => $category_id, 'country' => $country_list, 'cat' => $cat_list, 'filter' => $filter_list);
        return new Response(json_encode($left_side_bar),200,array('Content-Type'=>'application/json'));
    }

    private function get_filter( $category_id ){
        $filter_list = $this->getDoctrine()->getRepository('AseagleBundle:ProductDetailNameMapping')->createQueryBuilder('p')
            ->select('p.colId')
            ->leftJoin('AseagleBundle:ProductDetailDefaultValue','pv',"WITH","pv.productDetailId=p.id")
            ->where('p.catId = :category_id')
            ->groupBy('p.colId')
            ->having("sum(pv.count) > 0")
            ->setParameter('category_id', $category_id)
            ->getQuery()
            ->getResult();
        $result = array();
        foreach ($filter_list as $f){
            array_push($result,$f['colId']);
        }
        return $result;
    }

    private function get_country( $category_id ){
        $country_list = $this->getDoctrine()->getRepository('AseagleBundle:Country')->createQueryBuilder('r')
            ->select('r.id','r.count')
            ->getQuery()
            ->getResult();
        return $country_list;
    }

    private function get_cat_lr_tree( $category_id ){
        $cat_list = $this->getDoctrine()->getRepository('AseagleBundle:Category')->createQueryBuilder('c')
            ->select('c.id','c.parent_id','c.count')
            ->from('AseagleBundle:Category', 'p')
            ->where('p.id = :category_id')
            ->andWhere('c.lft BETWEEN p.lft AND p.rgt')
            ->setParameter('category_id', $category_id)
            ->getQuery()
            ->getResult();
        return $cat_list;
    }

    private function get_cat_tree( $parent_list, &$result ){
        foreach($parent_list as $parent){
            array_push($result,array('cat' => $parent, 'par' => $parent->getParent()));
            $children = $this->getDoctrine()->getRepository('AseagleBundle:Category')->findBy(array('parentId' => $parent->getId()), array('id' => 'ASC'));
            if (sizeof($children)>0){
                self::get_cat_tree($children, $result);
            }
        }
    }

    public function filterAction(Request $request)
    {
        $params = $request->query->all();
        $filter_string = '';
        foreach($params as $key => $value){
			$key = trim($key, "_");
            if(is_numeric($key) && $value != ''){
                $pieces = explode(",", $value);
                if(count($pieces) > 0){
                    $filter_string .= ' (';
                    foreach($pieces as $pi){
                        if(is_numeric($pi)){
                            $filter_string .= " p.product_detail_".$key."=".$pi. " or";
                        }
                    }
                    $filter_string = substr($filter_string, 0, -2);
                    $filter_string .= ') ';
                }
                $filter_string .= ' and';
            }
        }
        if(!empty($filter_string)){
            $filter_string = substr($filter_string, 0, -3);
        }

        //$mapping_helper = $this->get('mapping_helper');
        $category_id = $request->get('category_id');
        $category = $this->getDoctrine()->getRepository('AseagleBundle:Category')->find($category_id);
        $last_index = $request->query->get('last_id');
        $search_string = $request->query->get('search_string');
        $country_id = $request->query->get('country');

        $products = $this->getDoctrine()->getRepository('AseagleBundle:Product')->createQueryBuilder('p')
            ->where('p.category_id >= :lft and p.category_id <= :rgt '.($country_id != "" ? " and p.place_of_origin = ".$country_id : "").($search_string != "" ? " and p.title LIKE '%".$search_string."%'" : "").($filter_string != "" ? " and ".$filter_string : "" ))
            ->setParameter('lft', $category->getLft())
            ->setParameter('rgt', $category->getRgt())
            ->getQuery()
            ->getResult();

        $mapped_products_info = array();
        foreach($products as $product)
        {
            $product_detail = array(
                '1' => $product->getProductDetail1(),
                '2' => $product->getProductDetail2(),
                '3' => $product->getProductDetail3(),
                '4' => $product->getProductDetail4(),
                '5' => $product->getProductDetail5(),
                '6' => $product->getProductDetail6(),
                '7' => $product->getProductDetail7(),
                '8' => $product->getProductDetail8(),
                '9' => $product->getProductDetail9()
            );

            $image_helper = $this->get('image_helper');
            array_push($mapped_products_info, array(
                'id' => $product->getId(),
                'cat_id' => $product->getCategoryId(),
                'n' => $product->getTitle(),
                'pl' => $product->getPlaceOfOrigin(),
                'img' => $image_helper->generate_one_small_image_url($product->getPicture()),
                'pr' => $product->getPriceCurrency().$product->getPriceOrigin().'/'.$product->getPriceUnitType(),
                'm_o' => $product->getMinOrder().' '.$product->getMinOrderUnitType(),
                'port' => $product->getPort(),
                'pay' => $product->getPaymentTerms(),
                'sup' => array(
                    'c-id' => $product->getOwner()->getCompany()->getId(),
                    'lo' => $product->getOwner()->getCompany()->getLogo(),
                    'n' => $product->getOwner()->getCompany()->getName(),
                    'c' => $product->getOwner()->getCompany()->getRegCountryId(),
                    'v' => $product->getOwner()->getCompany()->getIsVerified(),
                    'm' => $product->getOwner()->getCompany()->getMemberType(),
                    'm_m' => $product->getOwner()->getCompany()->getMainMarketsDistribution(),
                    'm_p' => array_map(create_function('$o', 'return $o->getCategoryId();'), $product->getOwner()->getCompany()->getCompanyCategories()->toArray()),
                    'link' => $this->generateUrl('show_seller', array('id' => $product->getOwner()->getCompany()->getId()))
                    ),
                'cmt' => $product->getComment() == null ? array() : ($product->getComment() == "" ? array() : array($product->getComment())),
                'd' => $product_detail
            ));
        }
        return new Response(json_encode($mapped_products_info),200,array('Content-Type'=>'application/json'));
    }

    public function searchAction(Request $request)
    {
        $mapping_helper = $this->get('mapping_helper');
        $category_id = $request->query->get('category_id');
        $search_string = $request->query->get('search_string');
        $sort_by = $request->query->get('sort_by');

        $products = $this->getDoctrine()->getRepository('AseagleBundle:Product')->createQueryBuilder('p')
            ->where('p.title LIKE :search_string')
            ->setParameter('search_string', '%'.$search_string.'%')
            ->getQuery()
            ->getResult();

        $mapped_products_info = array();
        foreach($products as $product)
        {
            $product_detail = array(
            	'1' => $product->getProductDetail1(),
                '2' => $product->getProductDetail2(),
                '3' => $product->getProductDetail3(),
                '4' => $product->getProductDetail4(),
                '5' => $product->getProductDetail5(),
                '6' => $product->getProductDetail6(),
                '7' => $product->getProductDetail7(),
                '8' => $product->getProductDetail8(),
                '9' => $product->getProductDetail9(),
            	'10' => $product->getProductDetail10(),
            	'11' => $product->getProductDetail11(),
                '12' => $product->getProductDetail12(),
                '13' => $product->getProductDetail13(),
                '14' => $product->getProductDetail14(),
                '15' => $product->getProductDetail15(),
                '16' => $product->getProductDetail16(),
                '17' => $product->getProductDetail17(),
                '18' => $product->getProductDetail18(),
                '19' => $product->getProductDetail19(),
            	'20' => $product->getProductDetail20(),
                '21' => $product->getProductDetail21(),
                '22' => $product->getProductDetail22(),
                '23' => $product->getProductDetail23(),
                '24' => $product->getProductDetail24(),
                '25' => $product->getProductDetail25(),
                '26' => $product->getProductDetail26(),
                '27' => $product->getProductDetail27(),
                '28' => $product->getProductDetail28(),
                '29' => $product->getProductDetail29(),
            	'30' => $product->getProductDetail30(),
                '31' => $product->getProductDetail31(),
                '32' => $product->getProductDetail32(),
                '33' => $product->getProductDetail33(),
                '34' => $product->getProductDetail34(),
                '35' => $product->getProductDetail35(),
                '36' => $product->getProductDetail36(),
                '37' => $product->getProductDetail37(),
                '38' => $product->getProductDetail38(),
                '39' => $product->getProductDetail39(),
            	'40' => $product->getProductDetail40(),
            );

            $image_helper = $this->get('image_helper');
            array_push($mapped_products_info, array(
                'id' => $product->getId(),
                'cat_id' => $product->getCategoryId(),
                'n' => $product->getTitle(),
                'pl' => $product->getPlaceOfOrigin(),
                'img' => $image_helper->generate_one_small_image_url($product->getPicture()),
                'pr' => $product->getPriceCurrency().$product->getPriceOrigin().'/'.$product->getPriceUnitType(),
                'm_o' => $product->getMinOrder().' '.$product->getMinOrderUnitType(),
                'port' => $product->getPort(),
                'pay' => $product->getPaymentTerms(),
                'sup' => array('c-id' => $product->getOwner()->getCompany()->getId(),
                    'lo' => $product->getOwner()->getCompany()->getLogo(),
                    'n' => $product->getOwner()->getCompany()->getName(),
                    'c' => $product->getOwner()->getCompany()->getRegCountryId()
                ),
                'cmt' => $product->getComment() == null ? array() : ($product->getComment() == "" ? array() : array($product->getComment())),
                'd' => $product_detail
            ));
        }

        return $this->render('AseagleBundle:Search:index.html.twig', array('search_result_lists' => json_encode($mapped_products_info)));
    }

    public function getTokenAction()
    {
        return new Response($this->container->get('form.csrf_provider')
            ->generateCsrfToken('authenticate'));
    }


}
