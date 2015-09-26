<?php
/**
 * Created by PhpStorm.
 * User: HiepLuong
 * Date: 3/10/15
 * Time: 6:59 PM
 */

namespace WebPlatform\AseagleBundle\Services;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebPlatform\AseagleBundle\Entity\ContactList;
use WebPlatform\AseagleBundle\Entity\ReceivedMessage;
use WebPlatform\AseagleBundle\Entity\SentMessage;
use Doctrine\ORM\Mapping as ORM;

class MessageHelper extends Controller{
    public function sendMessage($cat_id, $post_received_ids, $subject, $body, $sender, $em, $write_contact=true) {

        //create & save sentmessage
        $sent_message = new SentMessage();
        $sent_message->setSender($sender);

        $receivers_in_cat = null;
        if(!empty($cat_id)){
            $cat = $em->getRepository('AseagleBundle:Category')->find($cat_id);
            $receiver_list = '';
            if($cat != null){
                $receivers_in_cat = $cat->getCategoryCompanies();
                foreach ($receivers_in_cat as $com) {
                    $receiver_list .=  !empty($receiver_list) ? ','.'c_'.$com->getCompanyId() : 'c_'.$com->getCompanyId();
                }
            }
            $sent_message->setReceiverIds($receiver_list);
        }else if($post_received_ids != ""){
            $sent_message->setReceiverIds($post_received_ids);
        }
        if($subject != ""){
            $sent_message->setSubject($subject);
        }
        if($body != ""){
            $sent_message->setBody($body);
        }
        $sent_message->setDate(new \DateTime('now'));
        $sent_message->setIsDraft(false);
        $em->persist($sent_message);
        $em->flush();

        //add contact list
        //create & save receivedmessage
        //send to entire category
        if(!empty($cat_id)){
            foreach ($receivers_in_cat as $com) {
                $staff = $com->getCompany()->getStaffs();
                foreach ($staff as $s) {
                    $received_message = new ReceivedMessage();
                    $received_message->setAuthor($sender);
                    $received_message->setReceiver($s);
                    if($subject != ""){
                        $received_message->setSubject($subject);
                    }
                    if($body != ""){
                        $received_message->setBody($body);
                    }
                    $received_message->setDate(new \DateTime('now'));
                    $received_message->setIsRead(false);
                    $received_message->setIsStar(false);
                    $em->persist($received_message);
                    $em->flush();
                }
                //save Contacts
                if($write_contact){
                    $check = $em->getRepository('AseagleBundle:ContactList')->findOneBy(array('user_id' => $sender->getId() ,'contact_id' => $com->getId(), 'is_company' => true));
                    if($check == null){
                        $contact = new ContactList();
                        $contact->setUser($sender);
                        $contact->setIsCompany(true);
                        $contact->setContactId($com->getId());
                        $em->persist($contact);
                        $em->flush();
                    }
                }
            }
        }else{
            //send to company & user
            $received_ids = explode(",", $post_received_ids);
            foreach ($received_ids as $value) {
                if(strpos($value,'c') !== false){
                    $rec_sep = explode("_", $value);
                    $com = $em->getRepository('AseagleBundle:CompanyProfile')->find($rec_sep[1]);
                    foreach ($com->getStaffs() as $s) {
                        $received_message = new ReceivedMessage();
                        $received_message->setAuthor($sender);
                        $received_message->setReceiver($s);
                        if($subject != ""){
                            $received_message->setSubject($subject);
                        }
                        if($body != ""){
                            $received_message->setBody($body);
                        }
                        $received_message->setDate(new \DateTime('now'));
                        $received_message->setIsRead(false);
                        $received_message->setIsStar(false);
                        $em->persist($received_message);
                        $em->flush();
                    }
                    //save Contacts
                    if($write_contact){
                        $check = $em->getRepository('AseagleBundle:ContactList')->findOneBy(array('user_id' => $sender->getId() ,'contact_id' => $com->getId(), 'is_company' => true));
                        if($check == null){
                            $contact = new ContactList();
                            $contact->setUser($sender);
                            $contact->setIsCompany(true);
                            $contact->setContactId($com->getId());
                            $em->persist($contact);
                            $em->flush();
                        }
                    }
                }else{
                    $receiver = $em->getRepository('AseagleBundle:User')->find(intval($value));
                    $received_message = new ReceivedMessage();
                    $received_message->setAuthor($sender);
                    $received_message->setReceiver($receiver);
                    if($subject != ""){
                        $received_message->setSubject($subject);
                    }
                    if($body != ""){
                        $received_message->setBody($body);
                    }
                    $received_message->setDate(new \DateTime('now'));
                    $received_message->setIsRead(false);
                    $received_message->setIsStar(false);
                    $em->persist($received_message);
                    $em->flush();

                    //save Contacts
                    if($write_contact){
                        $check = $em->getRepository('AseagleBundle:ContactList')->findOneBy(array('user_id' => $sender->getId() ,'contact_id' => $receiver->getId()));
                        if($check == null){
                            $contact = new ContactList();
                            $contact->setUser($sender);
                            $contact->setContactId($receiver->getId());
                            $em->persist($contact);
                            $em->flush();
                        }
                    }
                }
            }
        }
    }
} 