<?php
/**
 * Created by PhpStorm.
 * User: HiepLuong
 * Date: 9/19/15
 * Time: 2:24 AM
 */

namespace WebPlatform\AseagleBundle\Services;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping as ORM;

class EmailHelper {

    protected  $mailer;
    protected  $templating;
    protected  $image_helper;

    public function __construct($mailer,$templating,$image_helper)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->image_helper = $image_helper;
    }

    public function upload_product($user,$product)
    {
        $product->setPicture($this->image_helper->generate_one_small_image_url($product->getPicture()));

        $message = \Swift_Message::newInstance()
            ->setSubject('Upload Product Successful')
            ->setFrom('noreply@aseagle.com')
            ->setTo('wildnightwind111@gmail.com')
            ->setBody(
                $this->templating->render(
                    'AseagleBundle:EmailTemplates:upload_product.html.twig',
                    array('user' => $user,'product' => $product)
                ),
                'text/html'
            )
        ;
        $this->mailer->send($message);
    }


} 