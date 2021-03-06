<?php

namespace WebPlatform\AseagleBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebPlatform\AseagleBundle\Entity\Product;
use WebPlatform\AseagleBundle\Entity\BuyingRequest;
use WebPlatform\AseagleBundle\Entity\SentMessage;
use Doctrine\DBAL\DriverManager;

class ProductController extends Controller
{
    public function indexAction()
    {
        $products = $this->getUser()->getProducts();
        $image_helper = $this->get('image_helper');
        foreach($products as $product)
        {
            $product->setPicture($image_helper->generate_one_small_image_url($product->getPicture()));
        }
        //get current user
        $user = $this->getUser();
        return $this->render('AseagleBundle:Product:index.html.twig', array('products' => $products));
    }

    public function uploadAction()
    {
        //get current user
        $user = $this->getUser();
        return $this->render('AseagleBundle:Product:upload.html.twig');
    }

    public function createAction(Request $request)
    {
        // $_POST parameters
        $cat_id = $request->request->get('category_id');
        //get current user
        $user = $this->getUser();

        //create & save product
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository('AseagleBundle:Category')->find($cat_id);
        $owner = $em->getRepository('AseagleBundle:User')->find($user->getId());
        $company = $owner->getCompany();
        $product = new Product();
        $product->setCategory($cat);
        $product->setOwner($owner);
        $product->setCompany($company);
        if($request->request->get('title') != ""){
            $product->setTitle($request->request->get('title'));
        }
		if($request->request->get('place_of_origin') != ""){
            $product->setPlaceOfOrigin($request->request->get('place_of_origin'));
        }		
        if($request->request->get('brief_description') != ""){
            $product->setBriefDescription($request->request->get('brief_description'));
        }
        if($request->request->get('specification') != ""){
            $product->setSpecification($request->request->get('specification'));
        }
        if($request->request->get('min_order') != ""){
            $product->setMinOrder($request->request->get('min_order'));
        }
        if($request->request->get('min_order_unit_type') != ""){
            $product->setMinOrderUnitType($request->request->get('min_order_unit_type'));
        }
        if($request->request->get('price_currency') != ""){
            $product->setPriceCurrency($request->request->get('price_currency'));
        }
        if($request->request->get('price_origin') != ""){
            $product->setPriceOrigin($request->request->get('price_origin'));
        }
        if($request->request->get('price_unit_type') != ""){
            $product->setPriceUnitType($request->request->get('price_unit_type'));
        }
        if($request->request->get('port') != ""){
            $product->setPort($request->request->get('port'));
        }
        if($request->request->get('payment_terms') != ""){
            $product->setPaymentTerms($request->request->get('payment_terms'));
        }
        if($request->request->get('supply_ability') != ""){
            $product->setSupplyAbility($request->request->get('supply_ability'));
        }
        if($request->request->get('supply_applity_unit') != ""){
            $product->setSupplyAbilityUnit($request->request->get('supply_applity_unit'));
        }
        if($request->request->get('supply_ability_per_time') != ""){
            $product->setSupplyAbilityPerTime($request->request->get('supply_ability_per_time'));
        }
        if($request->request->get('deliver_time') != ""){
            $product->setDeliverTime($request->request->get('deliver_time'));
        }
        if($request->request->get('packaging') != ""){
            $product->setPackaging($request->request->get('packaging'));
        }
        if($request->request->get('product_detail_1') != ""){
            $product->setProductDetail1($request->request->get('product_detail_1'));
        }
        if($request->request->get('product_detail_2') != ""){
            $product->setProductDetail2($request->request->get('product_detail_2'));
        }
        if($request->request->get('product_detail_3') != ""){
            $product->setProductDetail3($request->request->get('product_detail_3'));
        }
        if($request->request->get('product_detail_4') != ""){
            $product->setProductDetail4($request->request->get('product_detail_4'));
        }
        if($request->request->get('product_detail_5') != ""){
            $product->setProductDetail5($request->request->get('product_detail_5'));
        }
        if($request->request->get('product_detail_6') != ""){
            $product->setProductDetail6($request->request->get('product_detail_6'));
        }
        if($request->request->get('product_detail_7') != ""){
            $product->setProductDetail7($request->request->get('product_detail_7'));
        }
        if($request->request->get('product_detail_8') != ""){
            $product->setProductDetail8($request->request->get('product_detail_8'));
        }
        if($request->request->get('product_detail_9') != ""){
            $product->setProductDetail9($request->request->get('product_detail_9'));
        }
        if($request->request->get('product_detail_10') != ""){
            $product->setProductDetail10($request->request->get('product_detail_10'));
        }
        if($request->request->get('product_detail_11') != ""){
            $product->setProductDetail11($request->request->get('product_detail_11'));
        }
        if($request->request->get('product_detail_12') != ""){
            $product->setProductDetail12($request->request->get('product_detail_12'));
        }
        if($request->request->get('product_detail_13') != ""){
            $product->setProductDetail13($request->request->get('product_detail_13'));
        }
        if($request->request->get('product_detail_14') != ""){
            $product->setProductDetail14($request->request->get('product_detail_14'));
        }
        if($request->request->get('product_detail_15') != ""){
            $product->setProductDetail15($request->request->get('product_detail_15'));
        }
        if($request->request->get('product_detail_16') != ""){
            $product->setProductDetail16($request->request->get('product_detail_16'));
        }
        if($request->request->get('product_detail_17') != ""){
            $product->setProductDetail17($request->request->get('product_detail_17'));
        }
        if($request->request->get('product_detail_18') != ""){
            $product->setProductDetail18($request->request->get('product_detail_18'));
        }
        if($request->request->get('product_detail_19') != ""){
            $product->setProductDetail19($request->request->get('product_detail_19'));
        }
        if($request->request->get('product_detail_20') != ""){
            $product->setProductDetail20($request->request->get('product_detail_20'));
        }
        if($request->request->get('product_detail_21') != ""){
            $product->setProductDetail21($request->request->get('product_detail_21'));
        }
        if($request->request->get('product_detail_22') != ""){
            $product->setProductDetail22($request->request->get('product_detail_22'));
        }
        if($request->request->get('product_detail_23') != ""){
            $product->setProductDetail23($request->request->get('product_detail_23'));
        }
        if($request->request->get('product_detail_24') != ""){
            $product->setProductDetail24($request->request->get('product_detail_24'));
        }
        if($request->request->get('product_detail_25') != ""){
            $product->setProductDetail25($request->request->get('product_detail_25'));
        }
        if($request->request->get('product_detail_26') != ""){
            $product->setProductDetail26($request->request->get('product_detail_26'));
        }
        if($request->request->get('product_detail_27') != ""){
            $product->setProductDetail27($request->request->get('product_detail_27'));
        }
        if($request->request->get('product_detail_28') != ""){
            $product->setProductDetail28($request->request->get('product_detail_28'));
        }
        if($request->request->get('product_detail_29') != ""){
            $product->setProductDetail29($request->request->get('product_detail_29'));
        }
        if($request->request->get('product_detail_30') != ""){
            $product->setProductDetail30($request->request->get('product_detail_30'));
        }
        if($request->request->get('product_detail_31') != ""){
            $product->setProductDetail31($request->request->get('product_detail_31'));
        }
        if($request->request->get('product_detail_32') != ""){
            $product->setProductDetail32($request->request->get('product_detail_32'));
        }
        if($request->request->get('product_detail_33') != ""){
            $product->setProductDetail33($request->request->get('product_detail_33'));
        }
        if($request->request->get('product_detail_34') != ""){
            $product->setProductDetail34($request->request->get('product_detail_34'));
        }
        if($request->request->get('product_detail_35') != ""){
            $product->setProductDetail35($request->request->get('product_detail_35'));
        }
        if($request->request->get('product_detail_36') != ""){
            $product->setProductDetail36($request->request->get('product_detail_36'));
        }
        if($request->request->get('product_detail_37') != ""){
            $product->setProductDetail37($request->request->get('product_detail_37'));
        }
        if($request->request->get('product_detail_38') != ""){
            $product->setProductDetail38($request->request->get('product_detail_38'));
        }
        if($request->request->get('product_detail_39') != ""){
            $product->setProductDetail39($request->request->get('product_detail_39'));
        }
        if($request->request->get('product_detail_40') != ""){
            $product->setProductDetail40($request->request->get('product_detail_40'));
        }
        if($request->request->get('form_picture') != ""){
            $product->setPicture($request->request->get('form_picture'));
        }

        $em->persist($product);
        $em->flush();

        //send email
        $email_service = $this->get('email_helper');
        $email_service->upload_product($user,$product);

        //check wish list
        //$product->checkWishProduct($em,$email_service);
        $wishlist = $em->getRepository('AseagleBundle:WishProduct')->createQueryBuilder('w')
            ->where('w.category_id='.$product->getCategory()->getId().($product->getCountryOfOrigin()!=null ? ' and w.country_id='.$product->getCountryOfOrigin() : '')." and w.title LIKE '%".$product->getTitle()."%'")
            ->addOrderBy('w.id', 'DESC')
            ->getQuery()
            ->getResult();
        foreach($wishlist as $wp)
        {
            //send email
            $email_service->check_wish_list($wp,$product);
        }


        return new Response(json_encode(array('result'=>'Product '.$product->getTitle().' is created!')),200,array('Content-Type'=>'application/json'));
    }

    public function showAction($id)
    {
        $mapping_helper = $this->get('mapping_helper');
        $image_helper = $this->get('image_helper');
        $product = $this->getDoctrine()->getRepository('AseagleBundle:Product')->find($id);
        $product_detail = array();
        self::notEmptyOrNull($product->getProductDetail1()) ? $product_detail['1'] = $product->getProductDetail1() : null;
        self::notEmptyOrNull($product->getProductDetail2()) ? $product_detail['2'] = $product->getProductDetail2() : null;
        self::notEmptyOrNull($product->getProductDetail3()) ? $product_detail['3'] = $product->getProductDetail3() : null;
        self::notEmptyOrNull($product->getProductDetail4()) ? $product_detail['4'] = $product->getProductDetail4() : null;
        self::notEmptyOrNull($product->getProductDetail5()) ? $product_detail['5'] = $product->getProductDetail5() : null;
        self::notEmptyOrNull($product->getProductDetail6()) ? $product_detail['6'] = $product->getProductDetail6() : null;
        self::notEmptyOrNull($product->getProductDetail7()) ? $product_detail['7'] = $product->getProductDetail7() : null;
        self::notEmptyOrNull($product->getProductDetail8()) ? $product_detail['8'] = $product->getProductDetail8() : null;
        self::notEmptyOrNull($product->getProductDetail9()) ? $product_detail['9'] = $product->getProductDetail9() : null;
        self::notEmptyOrNull($product->getProductDetail10()) ? $product_detail['10'] = $product->getProductDetail10() : null;
        self::notEmptyOrNull($product->getProductDetail11()) ? $product_detail['11'] = $product->getProductDetail11() : null;
        self::notEmptyOrNull($product->getProductDetail12()) ? $product_detail['12'] = $product->getProductDetail12() : null;
        self::notEmptyOrNull($product->getProductDetail13()) ? $product_detail['13'] = $product->getProductDetail13() : null;
        self::notEmptyOrNull($product->getProductDetail14()) ? $product_detail['14'] = $product->getProductDetail14() : null;
        self::notEmptyOrNull($product->getProductDetail15()) ? $product_detail['15'] = $product->getProductDetail15() : null;
        self::notEmptyOrNull($product->getProductDetail16()) ? $product_detail['16'] = $product->getProductDetail16() : null;
        self::notEmptyOrNull($product->getProductDetail17()) ? $product_detail['17'] = $product->getProductDetail17() : null;
        self::notEmptyOrNull($product->getProductDetail18()) ? $product_detail['18'] = $product->getProductDetail18() : null;
        self::notEmptyOrNull($product->getProductDetail19()) ? $product_detail['19'] = $product->getProductDetail19() : null;
        self::notEmptyOrNull($product->getProductDetail20()) ? $product_detail['20'] = $product->getProductDetail20() : null;
        self::notEmptyOrNull($product->getProductDetail21()) ? $product_detail['21'] = $product->getProductDetail21() : null;
        self::notEmptyOrNull($product->getProductDetail22()) ? $product_detail['22'] = $product->getProductDetail22() : null;
        self::notEmptyOrNull($product->getProductDetail23()) ? $product_detail['23'] = $product->getProductDetail23() : null;
        self::notEmptyOrNull($product->getProductDetail24()) ? $product_detail['24'] = $product->getProductDetail24() : null;
		self::notEmptyOrNull($product->getProductDetail25()) ? $product_detail['25'] = $product->getProductDetail25() : null;
        self::notEmptyOrNull($product->getProductDetail26()) ? $product_detail['26'] = $product->getProductDetail26() : null;
        self::notEmptyOrNull($product->getProductDetail27()) ? $product_detail['27'] = $product->getProductDetail27() : null;
        self::notEmptyOrNull($product->getProductDetail28()) ? $product_detail['28'] = $product->getProductDetail28() : null;
        self::notEmptyOrNull($product->getProductDetail29()) ? $product_detail['29'] = $product->getProductDetail29() : null;
        self::notEmptyOrNull($product->getProductDetail30()) ? $product_detail['30'] = $product->getProductDetail30() : null;
        self::notEmptyOrNull($product->getProductDetail31()) ? $product_detail['31'] = $product->getProductDetail31() : null;
        self::notEmptyOrNull($product->getProductDetail32()) ? $product_detail['32'] = $product->getProductDetail32() : null;
        self::notEmptyOrNull($product->getProductDetail33()) ? $product_detail['33'] = $product->getProductDetail33() : null;
        self::notEmptyOrNull($product->getProductDetail34()) ? $product_detail['34'] = $product->getProductDetail34() : null;
		self::notEmptyOrNull($product->getProductDetail35()) ? $product_detail['35'] = $product->getProductDetail35() : null;
        self::notEmptyOrNull($product->getProductDetail36()) ? $product_detail['36'] = $product->getProductDetail36() : null;
        self::notEmptyOrNull($product->getProductDetail37()) ? $product_detail['37'] = $product->getProductDetail37() : null;
        self::notEmptyOrNull($product->getProductDetail38()) ? $product_detail['38'] = $product->getProductDetail38() : null;
        self::notEmptyOrNull($product->getProductDetail39()) ? $product_detail['39'] = $product->getProductDetail39() : null;
        self::notEmptyOrNull($product->getProductDetail40()) ? $product_detail['40'] = $product->getProductDetail40() : null;
       
        $root = "/aseagle/web/files/";
        $product_info = array(
            'id' => $product->getId(),
            'cat_id' => $product->getCategoryId(),
            'n' => $product->getTitle(),
            'pr' => ($product->getPriceOrigin() != null ? $product->getPriceOrigin()." ".$product->getPriceCurrency().($product->getPriceUnitType() != null ? "/".$product->getPriceUnitType() : "") : ""),
            'm_o' => ($product->getMinOrder() != null ? $product->getMinOrder()." ".$product->getMinOrderUnitType() : ""),
            'port' => $product->getPort(),
            'pay' => $product->getPaymentTerms(),
            'cmt' => $product->getComment() == null ? array() : ($product->getComment() == "" ? array() : array($product->getComment())),
            'pic' => $image_helper->generate_image_url($product->getPicture(),$root),//$product->getPicture(),
            'sm_pic' => $image_helper->generate_one_small_image_url($product->getPicture()),
            'd' => $product_detail
        );
        $product_info['json'] = json_encode($product_info);
        $product_info['spec'] = $product->getSpecification();
        $product_info['pl'] = $product->getCountryOfOrigin() != null ? $product->getCountryOfOrigin()->getName() : "";
        $product_info['s_a'] = $product->getSupplyAbility() != null ? ($product->getSupplyAbility()." ".$product->getSupplyAbilityUnit().($product->getSupplyAbilityPerTime() != null ? '/'.$product->getSupplyAbilityPerTime() : "")) : "";
        $product_info['d_t'] = $product->getDeliverTime();
        $product_info['p_d'] = $product->getPackaging();

        //get company info
        $company_profile = $this->getDoctrine()->getRepository('AseagleBundle:CompanyProfile')->find($product->getCompany()->getId());
        $pic = $this->get('image_helper')->generate_image_url($company_profile->getPicture());

        //form get_quotation
        $user = $this->getUser();
        $buying_request = new BuyingRequest();
        $buying_request->setProduct($product);
        $buying_request->setTitle("I would like to have quotes of ".$product->getTitle());
        $quote_form = $this->createFormBuilder($buying_request)
            ->add('title', 'text', array('label' => 'Title:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give a title')))
            ->add('buying_request_message', 'textarea', array('label' => 'Detail:', 'attr' => array('class'=>'form-control textarea-wysihtml5')) )
            ->add('quantity', 'integer', array('label' => 'Quantity:', 'attr'=> array('class'=>'form-control input-md')))
            ->add('quantity_type', 'text', array('label' => 'Quantity Type:', 'attr'=> array('class'=>'form-control input-md')) )
            ->add('expired_date', 'collot_datetime', array('label' => 'Expired Date:', 'attr'=> array('class'=>'form-control input-md form_datetime'),'pickerOptions' => array('format' => 'dd/mm/yyyy')))
            ->getForm();

        $sent_message = new SentMessage();
        $con_supplier_form = $this->createFormBuilder($sent_message)
            ->add('subject', 'text', array('label' => 'Title:', 'attr' => array('class'=>'form-control input-md', 'placeholder' => 'Give a subject')))
            ->add('body', 'textarea', array('label' => 'Detail:', 'attr' => array('class'=>'form-control textarea-wysihtml5')) )
            ->getForm();

        return $this->render('AseagleBundle:Product:show.html.twig', array(
            'product_info' => $product_info, 'company_profile' => $company_profile, 'pic' => $pic, 'quote_form' => $quote_form->createView(), 'message_form' => $con_supplier_form->createView(),
        ));
    }

    public static function notEmptyOrNull($value){
        if(isset($value) && trim($value) != "") return true ;
        return false;
    }

    public function editAction($id)
    {
        $mapping_helper = $this->get('mapping_helper');
        $image_helper = $this->get('image_helper');
        $product = $this->getDoctrine()->getRepository('AseagleBundle:Product')->find($id);
        $product_detail = array();
        self::notEmptyOrNull($product->getProductDetail1()) ? $product_detail['1'] = $product->getProductDetail1() : null;
        self::notEmptyOrNull($product->getProductDetail2()) ? $product_detail['2'] = $product->getProductDetail2() : null;
        self::notEmptyOrNull($product->getProductDetail3()) ? $product_detail['3'] = $product->getProductDetail3() : null;
        self::notEmptyOrNull($product->getProductDetail4()) ? $product_detail['4'] = $product->getProductDetail4() : null;
        self::notEmptyOrNull($product->getProductDetail5()) ? $product_detail['5'] = $product->getProductDetail5() : null;
        self::notEmptyOrNull($product->getProductDetail6()) ? $product_detail['6'] = $product->getProductDetail6() : null;
        self::notEmptyOrNull($product->getProductDetail7()) ? $product_detail['7'] = $product->getProductDetail7() : null;
        self::notEmptyOrNull($product->getProductDetail8()) ? $product_detail['8'] = $product->getProductDetail8() : null;
        self::notEmptyOrNull($product->getProductDetail9()) ? $product_detail['9'] = $product->getProductDetail9() : null;
        self::notEmptyOrNull($product->getProductDetail10()) ? $product_detail['10'] = $product->getProductDetail10() : null;
        self::notEmptyOrNull($product->getProductDetail11()) ? $product_detail['11'] = $product->getProductDetail11() : null;
        self::notEmptyOrNull($product->getProductDetail12()) ? $product_detail['12'] = $product->getProductDetail12() : null;
        self::notEmptyOrNull($product->getProductDetail13()) ? $product_detail['13'] = $product->getProductDetail13() : null;
        self::notEmptyOrNull($product->getProductDetail14()) ? $product_detail['14'] = $product->getProductDetail14() : null;
        self::notEmptyOrNull($product->getProductDetail15()) ? $product_detail['15'] = $product->getProductDetail15() : null;
        self::notEmptyOrNull($product->getProductDetail16()) ? $product_detail['16'] = $product->getProductDetail16() : null;
        self::notEmptyOrNull($product->getProductDetail17()) ? $product_detail['17'] = $product->getProductDetail17() : null;
        self::notEmptyOrNull($product->getProductDetail18()) ? $product_detail['18'] = $product->getProductDetail18() : null;
        self::notEmptyOrNull($product->getProductDetail19()) ? $product_detail['19'] = $product->getProductDetail19() : null;
        self::notEmptyOrNull($product->getProductDetail20()) ? $product_detail['20'] = $product->getProductDetail20() : null;
        self::notEmptyOrNull($product->getProductDetail21()) ? $product_detail['21'] = $product->getProductDetail21() : null;
        self::notEmptyOrNull($product->getProductDetail22()) ? $product_detail['22'] = $product->getProductDetail22() : null;
        self::notEmptyOrNull($product->getProductDetail23()) ? $product_detail['23'] = $product->getProductDetail23() : null;
        self::notEmptyOrNull($product->getProductDetail24()) ? $product_detail['24'] = $product->getProductDetail24() : null;

        $root = "/aseagle/web/files/";
        $product_info = array(
            'id' => $product->getId(),
            'cat_id' => $product->getCategoryId(),
            'n' => $product->getTitle(),
            'pr' => $product->getPriceOrigin(),
            'm_o' => $product->getMinOrder(),
            'port' => $product->getPort(),
            'pay' => $product->getPaymentTerms(),
            'cmt' => $product->getComment() == null ? array() : ($product->getComment() == "" ? array() : array($product->getComment())),
            'pic' => $image_helper->generate_image_url($product->getPicture(),$root),//$product->getPicture(),
            'd' => $product_detail
        );
        $product_info['json'] = json_encode($product_info);
        $product_info['spec'] = $product->getSpecification();
        $product_info['b_d'] = $product->getBriefDescription();
        $product_info['s_a'] = $product->getSupplyAbility();
        $product_info['sa_u'] = $product->getSupplyAbilityUnit();
        $product_info['sa_t'] = $product->getSupplyAbilityPerTime();
        $product_info['d_t'] = $product->getDeliverTime();
        $product_info['p_d'] = $product->getPackaging();
        //get current user
        $user = $this->getUser();
        $product_info['seller_id'] = $user->getCompany() != null ? $user->getCompany()->getId() : null;
        return $this->render('AseagleBundle:Product:edit.html.twig', $product_info);
    }

    public function updateAction(Request $request, $id)
    {
        //update product
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AseagleBundle:Product')->find($id);

        if($request->request->get('title') != ""){
            $product->setTitle($request->request->get('title'));
        }
        if($request->request->get('brief_description') != ""){
            $product->setBriefDescription($request->request->get('brief_description'));
        }
        if($request->request->get('specification') != ""){
            $product->setSpecification($request->request->get('specification'));
        }
        if($request->request->get('min_order') != ""){
            $product->setMinOrder($request->request->get('min_order'));
        }
        if($request->request->get('min_order_unit_type') != ""){
            $product->setMinOrderUnitType($request->request->get('min_order_unit_type'));
        }
        if($request->request->get('price_currency') != ""){
            $product->setPriceCurrency($request->request->get('price_currency'));
        }
        if($request->request->get('price_origin') != ""){
            $product->setPriceOrigin($request->request->get('price_origin'));
        }
        if($request->request->get('price_unit_type') != ""){
            $product->setPriceUnitType($request->request->get('price_unit_type'));
        }
        if($request->request->get('port') != ""){
            $product->setPort($request->request->get('port'));
        }
        if($request->request->get('payment_terms') != ""){
            $product->setPaymentTerms($request->request->get('payment_terms'));
        }
        if($request->request->get('supply_ability') != ""){
            $product->setSupplyAbility($request->request->get('supply_ability'));
        }
        if($request->request->get('supply_applity_unit') != ""){
            $product->setSupplyAbilityUnit($request->request->get('supply_applity_unit'));
        }
        if($request->request->get('supply_ability_per_time') != ""){
            $product->setSupplyAbilityPerTime($request->request->get('supply_ability_per_time'));
        }
        if($request->request->get('deliver_time') != ""){
            $product->setDeliverTime($request->request->get('deliver_time'));
        }
        if($request->request->get('packaging') != ""){
            $product->setPackaging($request->request->get('packaging'));
        }
        if($request->request->get('product_detail_1') != ""){
            $product->setProductDetail1($request->request->get('product_detail_1'));
        }
        if($request->request->get('product_detail_2') != ""){
            $product->setProductDetail2($request->request->get('product_detail_2'));
        }
        if($request->request->get('product_detail_3') != ""){
            $product->setProductDetail3($request->request->get('product_detail_3'));
        }
        if($request->request->get('product_detail_4') != ""){
            $product->setProductDetail4($request->request->get('product_detail_4'));
        }
        if($request->request->get('product_detail_5') != ""){
            $product->setProductDetail5($request->request->get('product_detail_5'));
        }
        if($request->request->get('product_detail_6') != ""){
            $product->setProductDetail6($request->request->get('product_detail_6'));
        }
        if($request->request->get('product_detail_7') != ""){
            $product->setProductDetail7($request->request->get('product_detail_7'));
        }
        if($request->request->get('product_detail_8') != ""){
            $product->setProductDetail8($request->request->get('product_detail_8'));
        }
        if($request->request->get('product_detail_9') != ""){
            $product->setProductDetail9($request->request->get('product_detail_9'));
        }
        if($request->request->get('product_detail_10') != ""){
            $product->setProductDetail10($request->request->get('product_detail_10'));
        }
        if($request->request->get('product_detail_11') != ""){
            $product->setProductDetail11($request->request->get('product_detail_11'));
        }
        if($request->request->get('product_detail_12') != ""){
            $product->setProductDetail12($request->request->get('product_detail_12'));
        }
        if($request->request->get('product_detail_13') != ""){
            $product->setProductDetail13($request->request->get('product_detail_13'));
        }
        if($request->request->get('product_detail_14') != ""){
            $product->setProductDetail14($request->request->get('product_detail_14'));
        }
        if($request->request->get('product_detail_15') != ""){
            $product->setProductDetail15($request->request->get('product_detail_15'));
        }
        if($request->request->get('product_detail_16') != ""){
            $product->setProductDetail16($request->request->get('product_detail_16'));
        }
        if($request->request->get('product_detail_17') != ""){
            $product->setProductDetail17($request->request->get('product_detail_17'));
        }
        if($request->request->get('product_detail_18') != ""){
            $product->setProductDetail18($request->request->get('product_detail_18'));
        }
        if($request->request->get('product_detail_19') != ""){
            $product->setProductDetail19($request->request->get('product_detail_19'));
        }
        if($request->request->get('product_detail_20') != ""){
            $product->setProductDetail20($request->request->get('product_detail_20'));
        }
        if($request->request->get('product_detail_21') != ""){
            $product->setProductDetail21($request->request->get('product_detail_21'));
        }
        if($request->request->get('product_detail_22') != ""){
            $product->setProductDetail22($request->request->get('product_detail_22'));
        }
        if($request->request->get('product_detail_23') != ""){
            $product->setProductDetail23($request->request->get('product_detail_23'));
        }
        if($request->request->get('product_detail_24') != ""){
            $product->setProductDetail24($request->request->get('product_detail_24'));
        }
        if($request->request->get('product_detail_25') != ""){
            $product->setProductDetail25($request->request->get('product_detail_25'));
        }
        if($request->request->get('product_detail_26') != ""){
            $product->setProductDetail26($request->request->get('product_detail_26'));
        }
        if($request->request->get('product_detail_27') != ""){
            $product->setProductDetail27($request->request->get('product_detail_27'));
        }
        if($request->request->get('product_detail_28') != ""){
            $product->setProductDetail28($request->request->get('product_detail_28'));
        }
        if($request->request->get('product_detail_29') != ""){
            $product->setProductDetail29($request->request->get('product_detail_29'));
        }
        if($request->request->get('product_detail_30') != ""){
            $product->setProductDetail30($request->request->get('product_detail_30'));
        }
        if($request->request->get('product_detail_31') != ""){
            $product->setProductDetail31($request->request->get('product_detail_31'));
        }
        if($request->request->get('product_detail_32') != ""){
            $product->setProductDetail32($request->request->get('product_detail_32'));
        }
        if($request->request->get('product_detail_33') != ""){
            $product->setProductDetail33($request->request->get('product_detail_33'));
        }
        if($request->request->get('product_detail_34') != ""){
            $product->setProductDetail34($request->request->get('product_detail_34'));
        }
        if($request->request->get('product_detail_35') != ""){
            $product->setProductDetail35($request->request->get('product_detail_35'));
        }
        if($request->request->get('product_detail_36') != ""){
            $product->setProductDetail36($request->request->get('product_detail_36'));
        }
        if($request->request->get('product_detail_37') != ""){
            $product->setProductDetail37($request->request->get('product_detail_37'));
        }
        if($request->request->get('product_detail_38') != ""){
            $product->setProductDetail38($request->request->get('product_detail_38'));
        }
        if($request->request->get('product_detail_39') != ""){
            $product->setProductDetail39($request->request->get('product_detail_39'));
        }
        if($request->request->get('product_detail_40') != ""){
            $product->setProductDetail40($request->request->get('product_detail_40'));
        }
        if($request->request->get('form_picture') != ""){
            $product->setPicture($request->request->get('form_picture'));
        }

        $em->flush();

        return new Response(json_encode(array('result'=>'Product '.$product->getTitle().' is updated!')),200,array('Content-Type'=>'application/json'));
    }

    public function destroyAction($id)
    {
        $product = $this->getDoctrine()->getRepository('AseagleBundle:Product')->find($id);
        $name = $product->getTitle();
        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Product '.$name.' is deleted!');
        return $this->redirect($this->generateUrl('list_product',array('seller_id'=>$product->getOwner()->getCompany()->getId())));
        //TODO: Delete physical picture files
    }


}
