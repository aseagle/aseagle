<?php
/**
 * Created by PhpStorm.
 * User: HiepLuong
 * Date: 7/28/15
 * Time: 1:41 PM
 */

namespace WebPlatform\AseagleBundle\Services;


class CategoryHelper {

    protected  $em;

    public function __construct($emg)
    {
        $this->em = $emg;
    }

    public function category_list() {
        //get category
        $cats = $this->em->getRepository('AseagleBundle:Category')->findBy(array('parent_id' => '1'),null,null,null);
        return $cats;
    }
} 