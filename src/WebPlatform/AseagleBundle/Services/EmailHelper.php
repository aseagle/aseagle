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
    protected  $default_from = "noreply@aseagle.com";

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
            ->setFrom($this->default_from)
            ->setTo($user->getEmail())
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

    public function post_buying_request($user,$buying_request)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Post Buying Request')
            ->setFrom($this->default_from)
            ->setTo($user->getEmail())
            ->setBody(
                $this->templating->render(
                    'AseagleBundle:EmailTemplates:post_buying_request.html.twig',
                    array('user' => $user,'br' => $buying_request)
                ),
                'text/html'
            )
        ;
        $this->mailer->send($message);
    }

    public function receive_buying_request($user,$purchase_management)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Buying Request')
            ->setFrom($this->default_from)
            ->setTo($user->getEmail())
            ->setBody(
                $this->templating->render(
                    'AseagleBundle:EmailTemplates:receive_buying_request.html.twig',
                    array('user' => $user,'pm' => $purchase_management)
                ),
                'text/html'
            )
        ;
        $this->mailer->send($message);
    }

    public function message_supplier($user,$sent_message)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('One Buyer is contacting you')
            ->setFrom($this->default_from)
            ->setTo($user->getEmail())
            ->setBody(
                $this->templating->render(
                    'AseagleBundle:EmailTemplates:message_supplier.html.twig',
                    array('user' => $user,'sm' => $sent_message)
                ),
                'text/html'
            )
        ;
        $this->mailer->send($message);
    }

} 